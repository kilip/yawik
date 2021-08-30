<?php

namespace Yawik\Module\Job\Repository;

use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepositoryInterface;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceRepositoryTrait;
use Yawik\Component\Job\Repository\JobRepository as BaseJobRepository;

class JobRepository extends BaseJobRepository implements
    ServiceDocumentRepositoryInterface
{
    use ServiceRepositoryTrait;
}
