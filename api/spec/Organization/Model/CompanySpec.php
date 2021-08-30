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

namespace spec\Yawik\Organization\Model;

use PhpSpec\ObjectBehavior;
use Yawik\Component\Organization\Model\Company;
use Yawik\Module\Resource\Contracts\ResourceInterface;

class CompanySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Company::class);
    }

    public function it_should_be_a_resource()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    public function its_name_should_be_mutable()
    {
        $this->setName('name');
        $this->getName()->shouldReturn('name');
    }
}
