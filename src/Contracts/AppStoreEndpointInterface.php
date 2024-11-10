<?php

namespace AshkanAb\AppStore\Contracts;

use AshkanAb\AppStore\Http;

interface AppStoreEndpointInterface
{
    public function __construct(Http $client);


    public function send() : self;

    public function getResponse() : array;
}
