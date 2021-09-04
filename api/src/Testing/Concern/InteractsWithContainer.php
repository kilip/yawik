<?php

namespace Yawik\Testing\Concern;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

trait InteractsWithContainer
{
    protected KernelInterface $kernel;

    public function getContainer(): ContainerInterface
    {
        return $this->kernel->getContainer();
    }
}
