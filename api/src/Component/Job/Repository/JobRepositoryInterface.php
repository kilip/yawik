<?php

namespace Yawik\Component\Job\Repository;

interface JobRepositoryInterface
{
    public function listActiveJobs(): array;
}
