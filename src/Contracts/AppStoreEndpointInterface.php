<?php

namespace AppStore\Contracts;

use AppStore\Http;

interface AppStoreEndpointInterface
{
    public function __construct(Http $client);


    public function send() : self;

    public function getResponse() : array;
}
