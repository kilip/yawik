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

use Yawik\Resource\Model\SortableStatus;

class Status extends SortableStatus
{
    public function __construct(
        string $state = self::ACTIVE
    ) {
        $this->state = $state;
    }

    public function getOrder(): array
    {
        return [
            self::ACTIVE => 50,
            self::INACTIVE => 60,
        ];
    }
}
