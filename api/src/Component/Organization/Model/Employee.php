<?php

namespace Yawik\Component\Organization\Model;

use Yawik\Component\User\Model\UserInterface;

class Employee implements EmployeeInterface
{
    private UserInterface $user;

    private EmployeePermissionInterface $permissions;

    private string $role;

    private string $status = self::STATUS_ASSIGNED;

    public function __construct()
    {
        $this->permissions = new EmployeePermission();
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user): void
    {
        $this->user = $user;
    }

    /**
     * @return EmployeePermissionInterface
     */
    public function getPermissions(): EmployeePermissionInterface
    {
        return $this->permissions;
    }

    /**
     * @param EmployeePermissionInterface $permissions
     */
    public function setPermissions(EmployeePermissionInterface $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
