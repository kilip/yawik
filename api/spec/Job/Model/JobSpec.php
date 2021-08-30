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

namespace spec\Yawik\Job\Model;

use PhpSpec\ObjectBehavior;
use Yawik\Component\Job\Model\Job;
use Yawik\Component\Organization\Model\Company;
use Yawik\Module\Resource\Contracts\ResourceInterface;

/**
 * @covers \Yawik\Component\Job\Model\Job
 */
class JobSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Job::class);
    }

    public function it_should_implements_the_resource_interface()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    public function its_title_should_be_mutable()
    {
        $this->setTitle('title');
        $this->getTitle()->shouldReturn('title');
    }

    public function its_company_should_be_mutable(
        Company $company
    ) {
        $this->setCompany($company);
        $this->getCompany()->shouldReturn($company);
    }

    public function its_contact_email_should_be_mutable()
    {
        $this->setContactEmail('email');
        $this->getContactEmail()->shouldReturn('email');
    }

    public function its_language_should_be_mutable()
    {
        $this->setLanguage('en');
        $this->getLanguage()->shouldReturn('en');
    }
}
