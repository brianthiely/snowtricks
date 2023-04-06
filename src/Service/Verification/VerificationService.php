<?php

namespace App\Service\Verification;

use App\Entity\User;
use App\Service\Email\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class VerificationService
{
    const SUCCESS = 1;
    const INVALID_TOKEN = -1;
    const EXPIRED_TOKEN = -2;
    const USER_ALREADY_VALIDATED = -3;

    private EntityManagerInterface $entityManager;

    private UrlGeneratorInterface $urlGenerator;
    private EmailService $emailService;

    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator, EmailService $emailService)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
        $this->emailService = $emailService;
    }

    public function verifyUser(string $token): int
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['token' => $token]);

        if (!$user) {
            return self::INVALID_TOKEN;
        }

        if ($user->isValid()) {
            return self::USER_ALREADY_VALIDATED;
        }

        $tokenExpirationDate = $user->getTokenExpiresAt();
        $now = new \DateTime();

        if ($now > $tokenExpirationDate) {
            return self::EXPIRED_TOKEN;
        }

        $user->setValid(true);
        $user->setToken(null);
        $user->setTokenExpiresAt(null);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return self::SUCCESS;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendVerificationEmail(User $user, string $token): void
    {
        $verificationUrl = $this->urlGenerator->generate('app_verify', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

        $this->emailService->sendVerificationEmail($user, $verificationUrl);
    }
}
