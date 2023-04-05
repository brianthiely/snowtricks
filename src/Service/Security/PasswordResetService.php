<?php

namespace App\Service\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Email\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class PasswordResetService
{
    private UserRepository $userRepository;
    private TokenGeneratorInterface $tokenGenerator;
    private EntityManagerInterface $entityManager;
    private UrlGeneratorInterface $urlGenerator;
    private EmailService $emailService;


    public function __construct(UserRepository $userRepository, TokenGeneratorInterface $tokenGenerator, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, EmailService $emailService)
    {
        $this->userRepository = $userRepository;
        $this->tokenGenerator = $tokenGenerator;
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->emailService = $emailService;
    }

    public function generateToken(string $email): ?string
    {
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            return null;
        }

        $token = $this->tokenGenerator->generateToken();

        $user->setToken($token);
        $user->setTokenExpiresAt(new \DateTime('+24 hours'));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $token;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendPasswordResetEmail(User $user, string $token): void
    {
        $resetPasswordUrl = $this->urlGenerator->generate('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

        $this->emailService->sendPasswordResetEmail($user, $resetPasswordUrl);
    }
}
