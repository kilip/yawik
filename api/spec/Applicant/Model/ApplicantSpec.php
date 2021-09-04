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

namespace spec\Yawik\Applicant\Model;

use PhpSpec\ObjectBehavior;
use Yawik\Applicant\Model\Applicant;

class ApplicantSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Applicant::class);
    }
}
