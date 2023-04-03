<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use App\Service\JWTService;
use App\Service\SendMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/register', name: 'app_registration')]
    public function index(Request $request, UserPasswordHasherInterface
    $passwordHasher, EntityManagerInterface $em, UserRepository
    $userRepository, SendMailService $mailService, JWTService $JWTService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($userRepository->findOneBy(['email' => $user->getEmail()]) || $userRepository->findOneBy(['username' => $user->getUsername()])) {
                $this->addFlash('danger', 'Username or Email already used');
                return $this->redirectToRoute('app_registration');
            }
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();

            $header = [
                'alg' => 'HS256',
                'typ' => 'JWT'
            ];

            $payload = [
                'id' => $user->getId(),
            ];

            $token = $JWTService->generate($header, $payload, $this->getParameter('app.jwtsecret'));

            $mailService->send(
                'no-reply@snowtricks.com',
                $user->getEmail(),
                'SnowTricks - Registration',
                'registration',
                compact('user', 'token')
            );

            $this->addFlash('success', 'Registration successful');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/register/confirm/{token}', name: 'app_registration_confirm')]
    public function confirm(string $token,JWTService $jwtService,UserRepository $userRepository, EntityManagerInterface $em): Response
    {
        if($jwtService->isValid($token) && !$jwtService->isExpired($token) && $jwtService->check($token, $this->getParameter('app.jwtsecret'))){
            $payload = $jwtService->getPayload($token);
            $user = $userRepository->find($payload['id']);

            if($user && !$user->isValid()){
                $user->setValid(true);
                $em->flush($user);
                $this->addFlash('success', 'Account validated');
                return $this->redirectToRoute('homepage');
            }
        }
        $this->addFlash('danger', 'Invalid token');
        return $this->redirectToRoute('app_login');
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/register/resend', name: 'app_registration_resend')]
    public function resendVerify(JWTService $jwtService, UserRepository $userRepository, SendMailService $mailService): Response
    {
        $user = $this->getUser();

        if(!$user) {
            $this->addFlash('danger', 'You must be logged in to resend the verification email');
            return $this->redirectToRoute('app_login');
        }

        if($user->isValid()) {
            $this->addFlash('danger', 'Your account is already validated');
            return $this->redirectToRoute('homepage');
        }

        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];

        $payload = [
            'id' => $user->getId(),
        ];

        $token = $jwtService->generate($header, $payload, $this->getParameter('app.jwtsecret'));

        $mailService->send(
            'no-reply@snowtricks.com',
            $user->getEmail(),
            'SnowTricks - Registration',
            'registration',
            compact('user', 'token')
        );
        $this->addFlash('success', 'Verification email sent');
        return $this->redirectToRoute('homepage');
    }
}
