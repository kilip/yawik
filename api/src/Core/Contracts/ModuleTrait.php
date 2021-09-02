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

namespace Yawik\Core\Contracts;

use Doctrine\Inflector\InflectorFactory;

trait ModuleTrait
{
    protected string $name;

    protected string $basePath;

    public function __construct()
    {
        $this->configure();
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected function configure(): void
    {
        $r              = new \ReflectionClass($this);
        $this->basePath = \dirname($r->getFileName());

        $class      = $r->getShortName();
        $inflector  = InflectorFactory::create()->build();
        $name       = $inflector->tableize($class);
        $this->name = strtr($name, ['_module' => '']);
    }
}
