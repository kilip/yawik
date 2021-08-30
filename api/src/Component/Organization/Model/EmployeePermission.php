<?php

namespace Yawik\Component\Organization\Model;

class EmployeePermission implements EmployeePermissionInterface
{
    protected int $permissions;

    /**
     * @param ?int $permissions
     */
    public function __construct(?int $permissions = null)
    {
        if(is_null($permissions)){
            $permissions = self::JOBS_VIEW | self::APPLICATIONS_VIEW;
        }

        $this->permissions = $permissions;
    }


    /**
     * @return int
     */
    public function getPermissions(): int
    {
        return $this->permissions;
    }

    /**
     * @param int $permissions
     */
    public function setPermissions(int $permissions): void
    {
        $this->permissions = $permissions;
    }
}
