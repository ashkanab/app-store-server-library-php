<?php

namespace AppStore;

use DateTime;

final class Factory
{
    private JWToken $appStoreJWT;

    private bool $sandbox = false;
    public function __construct()
    {
    }

    public function config(
        string            $bundle,
        DateTime $expiresAt,
        string            $issuer,
        string            $keyId,
        string            $privateKeyPath
    ) : self
    {

        $this->appStoreJWT = new JWToken(
            $bundle,
            $expiresAt,
            $issuer,
            $keyId,
            $privateKeyPath,
        );

        return $this;
    }

    public function setEnv($env): self
    {
        $this->sandbox = $env != 'production';

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
