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

namespace Yawik\Tests\Functional\User;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class JobTest extends ApiTestCase
{
    public function test_create_job(): void
    {
        $response = static::createClient()->request('POST', '/api/jobs', [
            'json' => [
                'title' => 'hello world',
                'salary' => [
                    'currency' => 'USD',
                    'value' => 150000,
                    'unit' => 'year',
                ],
            ],
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_CREATED);
    }
}
