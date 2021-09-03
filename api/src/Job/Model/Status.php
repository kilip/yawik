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

namespace Yawik\Job\Model;

use Yawik\Resource\Model\SortableStatus;

class Status extends SortableStatus
{
    /**
     * @return int[]
     */
    public function getOrder(): array
    {
        return [
            self::CREATED => 10,
            self::WAITING_FOR_APPROVAL => 20,
            self::REJECTED => 30,
            self::PUBLISH => 40,
            self::ACTIVE => 50,
            self::INACTIVE => 60,
            self::EXPIRED => 70,
        ];
    }
}
