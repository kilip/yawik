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

namespace Yawik\Applicant\Model;

use Yawik\Resource\Model\ResourceInterface;
use Yawik\Resource\Model\ResourceTrait;
use Yawik\User\Model\Profile;

class Contact extends Profile  implements ResourceInterface
{
    use ResourceTrait;
}
