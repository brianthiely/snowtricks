<?php
declare(strict_types=1);

namespace App\Service;

class JWTService
{
    /**
     * Génère un token JWT
     *
     * @param array $header
     * @param array $payload
     * @param string $secret
     * @param int $validity
     * @return string
     */
    public function generate(array $header, array $payload, string $secret, int $validity = 86400): string
    {
        if($validity > 0) {
            $now = new \DateTimeImmutable();
            $expiration = $now->getTimestamp() + $validity;

            $payload['iat'] = $now->getTimestamp();
            $payload['exp'] = $expiration;
        }


        $base64Header = base64_encode(json_encode($header));
        $base64Payload = base64_encode(json_encode($payload));

        $base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);

        $secret = base64_encode($secret);

        $signature = hash_hmac('sha256', "$base64Header.$base64Payload", $secret, true);
        $base64Signature = base64_encode($signature);
        $base64Signature = str_replace(['+', '/', '='], ['-', '_', ''], $base64Signature);

        return "$base64Header.$base64Payload.$base64Signature";
    }

    /**
     * Vérifie la validité d'un token JWT
     *
     * @param string $token
     * @return bool
     */
    public function isValid(string $token): bool
    {
        return preg_match('/^[a-zA-Z0-9_-]+\.[a-zA-Z0-9_-]+\.[a-zA-Z0-9_-]+$/', $token) === 1;
    }

    /**
     * Récupère le header d'un token JWT
     *
     * @param string $token
     * @return array
     */
    public function getHeader(string $token): array
    {
        if(!$this->isValid($token)) {
            throw new \InvalidArgumentException('Invalid token');
        }

        $array = explode('.', $token);
        return json_decode(base64_decode($array[0]), true);
    }

    /**
     * Récupère le payload d'un token JWT
     *
     * @param string $token
     * @return array
     */
    public function getPayload(string $token): array
    {
        if(!$this->isValid($token)) {
            throw new \InvalidArgumentException('Invalid token');
        }

        $array = explode('.', $token);
        return json_decode(base64_decode($array[1]), true);
    }

    /**
     * Vérifie si un token JWT est expiré
     *
     * @param string $token
     * @return bool
     */
    public function isExpired(string $token): bool
    {
        $payload = $this->getPayload($token);
        return $payload['exp'] < time();
    }

    public function check(string $token, string $secret): bool
    {
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);

        $verifyToken = $this->generate($header, $payload, $secret,0);

        return $verifyToken === $token;
    }
}