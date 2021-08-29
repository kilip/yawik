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

namespace spec\Yawik\Organization;

use PhpSpec\ObjectBehavior;
use Yawik\Core\ModuleInterface;
use Yawik\Organization\OrganizationModule;

class OrganizationModuleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(OrganizationModule::class);
    }

    public function it_should_be_a_yawik_module()
    {
        $this->shouldImplement(ModuleInterface::class);
    }

    public function it_should_be_an_organization_module()
    {
        $this->getName()->shouldReturn('organization');
    }
}
