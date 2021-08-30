<?php

namespace Yawik\Component\Organization\Model;

interface EmployeePermissionInterface
{
    const JOBS_VIEW           = 16;      //  10000
    const JOBS_CREATE         = 24;      //  11000  # Create w/o View makes no sense
    const JOBS_CHANGE         = 20;      //  10100  # Change w/o view makes no sense
    const APPLICATIONS_VIEW   = 2;       //  00010
    const APPLICATIONS_CHANGE = 3;       //  00011  # change w/o view makes no sense
    const ALL                 = 31;      //  11111
    const NONE                = 0;       //  00000
}
