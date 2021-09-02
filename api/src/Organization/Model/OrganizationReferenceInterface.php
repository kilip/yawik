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

namespace Yawik\Organization\Model;

/**
 * Defines a OrganizationReference entity.
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
interface OrganizationReferenceInterface
{
    public const TYPE_NONE     = 'none';
    public const TYPE_OWNER    = 'owner';
    public const TYPE_EMPLOYEE = 'employee';

    /**
     * Returns true, if reference is of type TYPE_OWNER.
     */
    public function isOwner(): bool;

    /**
     * Returns true, if the reference is of type TYPE_EMPLOYEE.
     */
    public function isEmployee(): bool;

    /**
     * Returns true, if the user is associated with an organization.
     */
    public function hasAssociation(): bool;

    /**
     * Gets the referenced organization.
     */
    public function getOrganization(): ?OrganizationInterface;
}
