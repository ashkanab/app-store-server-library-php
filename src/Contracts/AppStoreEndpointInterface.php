<?php

namespace AshkanAb\AppStore\Contracts;

use AshkanAb\Appstore\Http;

interface AppStoreEndpointInterface
{
    public function __construct(Http $client);


    public function send() : self;

    public function getResponse() : array;
}
