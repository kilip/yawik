<?php

namespace Yawik\Tests\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\HttpKernel\KernelInterface;
use Yawik\Applicant\Model\Applicant;
use Yawik\Testing\Concern\InteractsWithJob;

class ApplicantContext implements Context
{
    use InteractsWithJob, InteractsWithRestContext;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given I send api request to apply :jobName job with body:
     */
    public function iSendApiRequestToApplyJobWith($jobName, PyStringNode $node)
    {
        $job = $this->iHaveAJob($jobName);
        $strings = $node->getRaw();
        $data = json_decode($strings,true);
        $data['job'] = $this->getIriFromItem($job);
        $strings = (string)json_encode($data);
        $strings = explode("\n", $strings);
        $body = new PyStringNode($strings, count($strings));

        $applyUrl = $this->getUrlFor('api_applicants_post_collection');
        $this->restContext->iSendARequestToWithBody('POST', $applyUrl, $body);
    }
}
