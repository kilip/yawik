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

use Yawik\Resource\Model\ResourceInterface;

/**
 * Defines an user group.
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @author Anthonius Munthi <me@itstoni.com>
 */
interface GroupInterface extends ResourceInterface
{
    /**
     * Gets the owner of this group.
     */
    public function getOwner(): UserInterface;

    /**
     * Sets the owner of this group.
     */
    public function setOwner(UserInterface $owner): void;

    /**
     * Gets the name of the group.
     */
    public function getName(): string;

    /**
     * Sets the name of the group.
     */
    public function setName(string $name): void;
}
