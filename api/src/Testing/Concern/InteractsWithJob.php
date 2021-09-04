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

namespace Yawik\Testing\Concern;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\Persistence\ObjectRepository;
use Yawik\Job\Model\Job;
use Yawik\Job\Model\JobInterface;

trait InteractsWithJob
{
    use InteractsWithDocumentManager;

    protected function iHaveAJob(string $jobName = 'Test Job'): JobInterface
    {
        $job = $this->getJobRepository()->findOneBy([
            'title' => $jobName,
        ]);
        if (null === $job) {
            $dm  = $this->getDocumentManager();
            $job = new Job();
            $job->setTitle($jobName);
            $dm->persist($job);
            $dm->flush();
        }

        return $job;
    }

    protected function getJobRepository(): ObjectRepository
    {
        /** @var DocumentManager $manager */
        $manager = $this->getDocumentManager(Job::class);

        return $manager->getRepository(Job::class);
    }
}
