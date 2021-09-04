<?php

namespace Yawik\Testing\Concern;

use Doctrine\Persistence\ObjectManager;

trait InteractsWithDocumentManager
{
    use InteractsWithContainer;

    protected function getDocumentManager(?string $class = null): ObjectManager
    {
        $registry = $this->getContainer()->get('doctrine_mongodb');
        if(null !== $class){
            return $registry->getManagerForClass($class);
        }
        return $registry->getManager();
    }
}
