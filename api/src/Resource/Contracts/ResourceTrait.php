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

namespace Yawik\Resource\Contracts;

trait ResourceTrait
{
    protected string $id;

    /**
     * @codeCoverageIgnore
     */
    public function getId(): string
    {
        return $this->id;
    }
}
