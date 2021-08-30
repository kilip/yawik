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

namespace Yawik\Component\Organization\Model;

interface OrganizationInterface
{
    /**
     * Always enabled even if there are no active jobs
     */
    const PROFILE_ALWAYS_ENABLE     = 'always';

    /**
     * Hide if there are no jobs available
     */
    const PROFILE_ACTIVE_JOBS       = 'active-jobs';

    /**
     * Always disabled profile
     */
    const PROFILE_DISABLED          = 'disabled';
}
