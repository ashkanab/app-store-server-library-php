<?php

namespace AshkanAb\AppStore;

use DateTime;
use Firebase\JWT\JWT;

class JWToken
{

    public function __construct(
        private readonly string   $bundle,
        private readonly DateTime $expiresAt,
        private readonly string   $issuer,
        private readonly string   $keyId,
        private readonly string   $privateKeyPath
    )
    {
    }


    public function sign(): string
    {
        return JWT::encode(
            [
                'iss' => $this->issuer,
                'aud' => 'appstoreconnect-v1',
                'iat' => (new DateTime('now'))->getTimestamp(),
                'exp' => $this->expiresAt->getTimestamp(),
                'bid' => $this->bundle
            ],
            file_get_contents($this->privateKeyPath),
            'ES256',
            $this->keyId,
            ['typ' => 'JWT']
        );
    }
}
