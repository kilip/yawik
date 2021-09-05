<?php

/*
 * This file is part of the Yawik project.
 *
 * (c) 2013-2021 Cross Solution
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Yawik\Resource\Doctrine;

use MongoDB\Client as BaseClient;

class Client extends BaseClient
{
    public function __construct(string $uri = 'mongodb://127.0.0.1/', array $uriOptions = [], array $driverOptions = [])
    {
        if (false !== str_contains($uri, 'mongodb+srv')) {
            $uriOptions = [];
        }
        parent::__construct($uri, $uriOptions, $driverOptions);
    }
}
