<?php
declare(strict_types=1);
namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordRequestType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use App\Service\Security\PasswordResetService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

         $error = $authenticationUtils->getLastAuthenticationError();

         $lastUsername = $authenticationUtils->getLastUsername();


          return $this->render('security/login.html.twig', compact('lastUsername', 'error'));
    }


    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function sendPasswordResetEmail(Request $request,PasswordResetService $passwordResetService):Response
    {
       $form = $this->createForm(ResetPasswordRequestType::class);

         $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $email = $form->get('email')->getData();

                $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);

                if (!$user) {
                    $this->addFlash('danger', 'No user found for email '.$email);
                    return $this->redirectToRoute('app_forgot_password');
                }

                $token = $passwordResetService->generateToken($email);

                if (!$token) {
                    $this->addFlash('danger', 'An error occurred, please try again');
                    return $this->redirectToRoute('app_login');
                }

                $passwordResetService->sendPasswordResetEmail($user, $token);

                $this->addFlash('success', 'An email has been sent to your address');

                return $this->redirectToRoute('app_login');
            }
            $form->createView();
            return $this->render('security/reset_password_request.html.twig', compact('form'));
    }


    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function resetPassword(string $token, UserRepository $userRepository, Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher):Response
    {
        $user = $userRepository->findOneBy(['token' => $token]);

        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setToken(null);
            $user->setTokenExpiresAt(null);
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
