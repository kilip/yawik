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
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Yawik\Core\Contracts\ModuleInterface;

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
        $env = $this->getEnvironment();
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$env.'/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$env.'.yaml');
        } else {
            $container->import('../config/{services}.php');
        }

        foreach ($this->modules as $module) {
            $this->configureModule($container, $module);
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $env = $this->getEnvironment();

        $routes->import('../config/{routes}/'.$env.'/*.yaml');
        $routes->import('../config/{routes}/*.yaml');

        if (is_file(\dirname(__DIR__).'/config/routes.yaml')) {
            $routes->import('../config/routes.yaml');
        } else {
            $routes->import('../config/{routes}.php');
        }

        foreach($this->modules as $module){
            $dir = $module->getBasePath().'/Resources/routes';
            if(is_dir($dir)){
                $routes->import($dir.'/*.yaml');
                $routes->import($dir.'/{'.$env.'}/*.yaml');
            }
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
        /** @psalm-var array<array-key,class-string> $modules */
        $modules = [];

        $finder = Finder::create()
            ->in(__DIR__)
            ->depth(1)
            ->name('*Module.php');

        /** @var SplFileInfo $file */
        foreach ($finder->files() as $file) {
            $className = __NAMESPACE__.'\\'.$file->getRelativePath().'\\'.$file->getBasename('.php');
            if (class_exists($className, true)) {
                $modules[] = $className;
            }
        }
        foreach ($modules as $class) {
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
