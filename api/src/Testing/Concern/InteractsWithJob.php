<?php

namespace Yawik\Testing\Concern;

use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Doctrine\Persistence\ObjectRepository;
use Yawik\Job\Model\Job;
use Yawik\Job\Model\JobInterface;

trait InteractsWithJob
{
    use InteractsWithDocumentManager;

    protected function iHaveAJob(string $jobName = 'Test Job'): JobInterface
    {
        $job = $this->getJobRepository()->findOneBy([
            'title' => $jobName
        ]);
        if(null === $job){
            $dm = $this->getDocumentManager();
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
