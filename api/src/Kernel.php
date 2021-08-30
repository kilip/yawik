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

namespace Yawik;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Yawik\Module\Core\ModuleInterface;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * @var array|ModuleInterface[]
     * @psalm-var array<array-key,ModuleInterface>
     */
    protected iterable $modules = [];

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$this->environment.'.yaml');
        } else {
            $container->import('../config/{services}.php');
        }

        foreach ($this->modules as $module) {
            $this->configureModule($container, $module);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/{routes}/'.$this->environment.'/*.yaml');
        $routes->import('../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import('../config/routes.yaml');
        } else {
            $routes->import('../config/{routes}.php');
        }
    }

    protected function initializeBundles(): void
    {
        parent::initializeBundles();

        $this->modules = [];
        /** @var ModuleInterface $module */
        foreach ($this->registerModules() as $module) {
            $name                 = $module->getName();
            $this->modules[$name] = $module;
        }
    }

    /**
     * @psalm-suppress MixedMethodCall
     * @psalm-suppress UnresolvableInclude
     * @psalm-suppress InvalidReturnType
     */
    protected function registerModules(): iterable
    {
        /** @psalm-var array<array-key,class-string> $contents */
        $contents = require $this->getProjectDir().'/config/modules.php';
        foreach ($contents as $class) {
            yield new $class();
        }
    }

    private function configureModule(ContainerConfigurator $configurator, ModuleInterface $module): void
    {
        $env        = $this->getEnvironment();
        $moduleName = $module->getName();
        $configurator->parameters()->set('yawik.'.$moduleName.'.base_path', $module->getBasePath());

        // load module services
        if (is_dir($path = $module->getBasePath().'/Resources/config')) {
            $configurator->import($path.'/*.xml');
            $configurator->import($path.'/*.yaml');
            if (is_dir($path.'/'.$env)) {
                $configurator->import($path.'/'.$env.'/*.xml');
                $configurator->import($path.'/'.$env.'/*.yaml');
            }
        }
    }
}
