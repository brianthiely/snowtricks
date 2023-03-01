<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\RegistrationSuccessEvent;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_registration')]
    public function index(Request $request, UserPasswordHasherInterface
    $passwordHasher, EntityManagerInterface $em, UserRepository
    $userRepository, EventDispatcherInterface $dispatcher): Response
    {
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





            $this->addFlash('success', 'Registration successful');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
