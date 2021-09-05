<?php

namespace Yawik\Resource\Doctrine;

use MongoDB\Client as BaseClient;

class Client extends BaseClient
{
    public function __construct(string $uri = 'mongodb://127.0.0.1/', array $uriOptions = [], array $driverOptions = [])
    {
        if(false !== str_contains($uri, 'mongodb+srv')){
            $uriOptions = [];
        }
        parent::__construct($uri, $uriOptions, $driverOptions);
    }
}
