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

namespace Yawik\Tests\Functional\Job;

use Yawik\Testing\ApiTestCase;

/**
 * @covers \Yawik\Job\Model\Job
 * @covers \Yawik\Organization\Model\Company
 */
class JobTest extends ApiTestCase
{
    public function test_get_jobs()
    {
        $response = $this->get('/jobs');

        $this->assertResponseIsSuccessful();
        $json = $response->toArray();
        $this->assertCount(5, $json);
    }
}
