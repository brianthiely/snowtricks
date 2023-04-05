<?php
declare(strict_types=1);
namespace App\Controller;

use App\Form\ResetPasswordRequestType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use App\Service\SendMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

         $error = $authenticationUtils->getLastAuthenticationError();

         $lastUsername = $authenticationUtils->getLastUsername();

        $session = $request->getSession();
        $referer = $request->headers->get('referer');
        if ($referer) {
            $session->set('_security.main.target_path', $referer);
        }

          return $this->render('security/login.html.twig', compact('lastUsername', 'error'));
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/forgotten-password', name: 'app_forgotten_password')]
    public function forgottenPassword(Request $request, UserRepository $userRepository,TokenGeneratorInterface $tokenGenerator, EntityManagerInterface $em, SendMailService $mailService):Response
    {
        $form = $this->createForm(ResetPasswordRequestType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user = $userRepository->findOneBy(['email' => $form->get('email')->getData()]);

            if(!$user) {
                $this->addFlash('danger', 'Une erreur est survenue, veuillez réessayer');
                return $this->redirectToRoute('app_login');
            }

            $token = $tokenGenerator->generateToken();

            $user->setResetToken($token);
            $em->persist($user);
            $em->flush();


            $url = $this->generateUrl('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

            $context = compact('user', 'url');
            $mailService->send(
                'no-reply@snowtrick.com',
                $user->getEmail(),
                'Réinitialisation de votre mot de passe',
                'password_reset',
                $context
            );

            $this->addFlash('success', 'Un email de réinitialisation de mot de passe vous a été envoyé');

            return $this->redirectToRoute('app_login');
        }

        $form->createView();
        return $this->render('security/reset_password_request.html.twig', compact('form'));
    }


    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function resetPassword(string $token, UserRepository $userRepository, Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher):Response
    {
        $user = $userRepository->findOneBy(['resetToken' => $token]);

        if(!$user) {
            $this->addFlash('danger', 'Une erreur est survenue, veuillez réessayer');
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setResetToken('');
            $user->setPassword($hasher->hashPassword($user, $form->get('password')->getData()));
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Votre mot de passe a bien été modifié');

            return $this->redirectToRoute('app_login');
        }


        $form->createView();
        return $this->render('security/reset_password.html.twig', compact('form'));
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
