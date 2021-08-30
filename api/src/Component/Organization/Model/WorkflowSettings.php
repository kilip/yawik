<?php

namespace Yawik\Component\Organization\Model;

use Yawik\Component\Resource\Model\ResourceInterface;
use Yawik\Component\Resource\Model\ResourceTrait;

class WorkflowSettings implements WorkflowSettingsInterface
{
    protected bool $acceptApplicationByDepartmentManager = true;

    protected bool $assignDepartmentManagersToJobs = true;

    protected bool $acceptApplicationByRecruiters = false;

    /**
     * @return bool
     */
    public function isAcceptApplicationByDepartmentManager(): bool
    {
        return $this->acceptApplicationByDepartmentManager;
    }

    /**
     * @param bool $acceptApplicationByDepartmentManager
     */
    public function setAcceptApplicationByDepartmentManager(bool $acceptApplicationByDepartmentManager): void
    {
        $this->acceptApplicationByDepartmentManager = $acceptApplicationByDepartmentManager;
    }

    /**
     * @return bool
     */
    public function isAssignDepartmentManagersToJobs(): bool
    {
        return $this->assignDepartmentManagersToJobs;
    }

    /**
     * @param bool $assignDepartmentManagersToJobs
     */
    public function setAssignDepartmentManagersToJobs(bool $assignDepartmentManagersToJobs): void
    {
        $this->assignDepartmentManagersToJobs = $assignDepartmentManagersToJobs;
    }

    /**
     * @return bool
     */
    public function isAcceptApplicationByRecruiters(): bool
    {
        return $this->acceptApplicationByRecruiters;
    }

    /**
     * @param bool $acceptApplicationByRecruiters
     */
    public function setAcceptApplicationByRecruiters(bool $acceptApplicationByRecruiters): void
    {
        $this->acceptApplicationByRecruiters = $acceptApplicationByRecruiters;
    }
}
