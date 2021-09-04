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

namespace Yawik\Testing\Concern;

use Doctrine\Persistence\ObjectManager;

trait InteractsWithDocumentManager
{
    use InteractsWithContainer;

    protected function getDocumentManager(?string $class = null): ObjectManager
    {
        $registry = $this->getContainer()->get('doctrine_mongodb');
        if (null !== $class) {
            return $registry->getManagerForClass($class);
        }

        return $registry->getManager();
    }
}
