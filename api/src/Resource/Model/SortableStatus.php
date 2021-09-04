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

namespace Yawik\Resource\Model;

abstract class SortableStatus implements StatusInterface
{
    use ResourceTrait;

    /**
     * name of the job status.
     */
    protected string $state;

    public function getState(): string
    {
        return $this->state;
    }

    public function is(string $state): bool
    {
        return $state === $this->state;
    }

    public function getStates(): array
    {
        $reflection = new \ReflectionClass(static::class);

        return array_values($reflection->getConstants());
    }
}
