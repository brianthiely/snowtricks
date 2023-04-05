<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Service\Register\RegistrationService;
use App\Service\Verification\VerificationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/register', name: 'app_registration')]
    public function register(Request $request, RegistrationService $registrationService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            if ($registrationService->checkExistingUser($user)) {
                $this->addFlash('danger', 'Username or Email already used');
                return $this->redirectToRoute('app_registration');
            }

            $registrationService->registerUser($user);

            $this->addFlash('success', 'Registration successful, please check your email to verify your account');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/verify/resend', name: 'app_resend_verification_email')]
    public function resendVerificationEmail (VerificationService $verificationService): Response
    {
        $user = $this->getUser();
        if (!$user instanceof User) {
            return $this->redirectToRoute('app_login');
        }

        if ($user->isValid()) {
            $this->addFlash('danger', 'Your account is already validated');
            return $this->redirectToRoute('homepage');
        }

        $verificationService->sendVerificationEmail($user, $user->getToken());

        $this->addFlash('success', 'A verification email has been sent to your email address');

        return $this->redirectToRoute('homepage');
    }

    #[Route('/verify/{token}', name: 'app_verify')]
    public function verifyUserAccount(string $token, VerificationService $verificationService): Response
    {
        $result = $verificationService->verifyUser($token);

        switch ($result) {
            case VerificationService::SUCCESS:
                $this->addFlash('success', 'Your account has been successfully verified');
                break;
            case VerificationService::INVALID_TOKEN:
                $this->addFlash('danger', 'Invalid verification link');
                break;
            case VerificationService::EXPIRED_TOKEN:
                $this->addFlash('danger', 'Verification link has expired');
                break;
            case VerificationService::USER_ALREADY_VALIDATED:
                $this->addFlash('warning', 'Your account has already been verified');
                break;
        }

        return $this->redirectToRoute('app_login');
    }
}
