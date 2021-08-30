<?php

namespace Yawik\Component\Organization\Model;

interface EmployeeInterface
{
    const STATUS_ASSIGNED   = 'ASSIGNED';
    const STATUS_PENDING    = 'PENDING';
    const STATUS_REJECTED   = 'REJECTED';
    const STATUS_UNASSIGNED = 'UNASSIGNED';

    /**
     * defines the role of a recruiter
     */
    const ROLE_RECRUITER = 'recruiter';
    /**
     * defines the role of a department manager
     */
    const ROLE_DEPARTMENT_MANAGER = 'department manager';
    /**
     * defines the role of the management
     */
    const ROLE_MANAGEMENT = 'management';
}
