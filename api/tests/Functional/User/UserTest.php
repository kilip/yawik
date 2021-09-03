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
use Yawik\User\Model\Image;

class UserTest extends ApiTestCase
{
    public function test_foo()
    {
        static::createClient();
        $container = $this->getContainer()->get('doctrine_mongodb');
        $dm        = $container->getManagerForClass(Image::class);
        $repo      = $dm->getRepository(Image::class);

        /** @var Image $image */
        $image = $repo->find('55bcd602c5105c63237b240f');
        $this->assertNotNull($image);
        $this->assertNotNull($image->getMetadata());
    }

    public function test_get_job(): void
    {
        $response = static::createClient()->request('GET','/media/resolve/organization_image/56c1e7784e197fba70d3cc2f');
        $this->assertResponseIsSuccessful();
    }
}
