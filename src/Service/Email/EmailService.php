<?php

namespace App\Service\Email;

use App\Entity\User;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

class EmailService
{
    private MailerInterface $mailer;
    private string $senderEmail;

    public function __construct(MailerInterface $mailer, string $senderEmail = 'no-reply@snowtricks.com')
    {
        $this->mailer = $mailer;
        $this->senderEmail = $senderEmail;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendVerificationEmail(User $user, string $verificationUrl): void
    {
        $email = (new TemplatedEmail())
            ->from($this->senderEmail)
            ->to($user->getEmail())
            ->subject('Verify your account')
            ->htmlTemplate('email/registration/verify.html.twig')
            ->context([
                'verificationUrl' => $verificationUrl,
                'user' => $user,
            ]);

        $this->mailer->send($email);
    }
}
