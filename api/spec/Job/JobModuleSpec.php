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

namespace spec\Yawik\Job;

use PhpSpec\ObjectBehavior;
use Yawik\Core\ModuleInterface;
use Yawik\Job\JobModule;

/**
 * @covers \Yawik\Job\JobModule
 */
class JobModuleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(JobModule::class);
    }

    public function it_should_be_a_yawik_module()
    {
        $this->shouldImplement(ModuleInterface::class);
    }

    public function it_should_be_a_job_module()
    {
        $this->getName()->shouldReturn('job');
    }

    public function it_should_returns_the_base_path_for_module()
    {
        $this->getBasePath()->shouldReturn(realpath(
            __DIR__.'/../../src/Job'
        ));
    }
}
