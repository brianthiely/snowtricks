<?php

namespace App\Service\Register;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\Verification\VerificationService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationService
{
    private UserRepository $userRepository;
    private EntityManagerInterface $em;
    private UserPasswordHasherInterface $passwordHasher;
    private VerificationService $verificationService;
    private TokenGeneratorInterface $tokenGenerator;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher, VerificationService $verificationService, TokenGeneratorInterface $tokenGenerator)
    {
        $this->userRepository = $userRepository;
        $this->em = $em;
        $this->passwordHasher = $passwordHasher;
        $this->verificationService = $verificationService;
        $this->tokenGenerator = $tokenGenerator;

    }

    public function checkExistingUser(User $user): bool
    {
        return $this->userRepository->findOneBy(['email' => $user->getEmail()]) || $this->userRepository->findOneBy(['username' => $user->getUsername()]);
    }

    /**
     * @throws Exception
     * @throws TransportExceptionInterface
     */
    public function registerUser(User $user): void
    {
        $token = $this->tokenGenerator->generateToken();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);
        $user->setToken($token);
        $user->setTokenExpiresAt(new \DateTime('+24 hours'));

        $this->em->persist($user);
        $this->em->flush();

        $this->verificationService->sendVerificationEmail($user, $user->getToken());
    }
}
