<?php

namespace Yawik\Tests\Functional\User;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use Yawik\User\Model\Image;

class UserTest extends ApiTestCase
{
    public function test_foo()
    {
        static::createClient();
        $container = $this->getContainer()->get('doctrine_mongodb');
        $dm = $container->getManagerForClass(Image::class);
        $repo = $dm->getRepository(Image::class);

        /** @var Image $image */
        $image = $repo->find('55bcd602c5105c63237b240f');
        $this->assertNotNull($image);
        $this->assertNotNull($image->getMetadata());
    }
}
