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

namespace Yawik\User\Model;

use Yawik\Resource\Model\ResourceTrait;

class Group implements GroupInterface
{
    use ResourceTrait;

    protected UserInterface $owner;

    protected string $name;

    public function __construct(?string $name = null, ?UserInterface $owner = null)
    {
        if (null !== $name) {
            $this->setName($name);
        }
        if (null !== $owner) {
            $this->owner = $owner;
        }
    }

    public function getOwner(): UserInterface
    {
        return $this->owner;
    }

    public function setOwner(UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
