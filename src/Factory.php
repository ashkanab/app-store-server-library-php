<?php

namespace AshkanAb\AppStore;

use DateTime;

final class Factory
{
    private JWToken $appStoreJWT;

    private bool $sandbox = false;
    public function __construct(
        string            $bundle,
        DateTime $expiresAt,
        string            $issuer,
        string            $keyId,
        string            $privateKeyPath)
    {
        $this->appStoreJWT = new JWToken(
            $bundle,
            $expiresAt,
            $issuer,
            $keyId,
            $privateKeyPath,
        );
    }

    public function isSandbox($sandbox = false): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }


    public function client() : Client
    {
        return new Client(new Http(
            $this->appStoreJWT->sign(),
            $this->sandbox
        ));
    }
}
