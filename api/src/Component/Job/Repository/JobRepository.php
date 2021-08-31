<?php

namespace Yawik\Component\Job\Repository;

use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Yawik\Component\Job\Model\Job;
use Yawik\Component\Resource\Model\StatusInterface;

class JobRepository extends DocumentRepository implements
    JobRepositoryInterface
{
    protected $documentName = Job::class;

    public function listActiveJobs(): array
    {
        $qb = $this->createQueryBuilder();
        $qb->field('status.name')->in([StatusInterface::ACTIVE]);
        $qb->field('isDraft')->equals(false);
        $qb->getQuery()->toArray();
    }
}
