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

namespace Yawik\User\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;
use Yawik\Organization\Model\OrganizationReferenceInterface;
use Yawik\Resource\Model\ResourceTrait;
use Yawik\Resource\Model\StatusInterface;

class User implements UserInterface, SecurityUserInterface
{
    use ResourceTrait;

    // @TODO: add migration to change field from login
    protected string $username;

    protected string $role;

    protected ProfileInterface $info;

    protected ?string $password = null;

    protected ?string $email = null;

    protected array $socialProfiles = [];

    // @TODO: integrate settings
    // protected Collection $settings;

    // @TODO: integrate photo
    // protected Photo $photo;

    protected Collection $groups;

    protected ?OrganizationReferenceInterface $organization = null;

    // @TODO: add migration to change field from isDraft
    protected bool $draft = false;

    protected ?StatusInterface $status = null;

    /**
     * @var array|string[]
     * @psalm-var non-empty-array<array-key,string>
     */
    protected array $roles = ['ROLE_USER'];

    public function __construct()
    {
        $this->status         = new Status();
        $this->groups         = new ArrayCollection();
        $this->socialProfiles = [];
    }

    public function getRoles(): array
    {
        $this->roles[] = 'ROLE_USER';

        return array_unique($this->roles);
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials(): void
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUserIdentifier(): string
    {
        return 'username';
    }

    /**
     * @param array|non-empty-array<array-key,string> $roles
     * @psalm-suppress MixedPropertyTypeCoercion
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getInfo(): ProfileInterface
    {
        return $this->info;
    }

    public function setInfo(ProfileInterface $info): void
    {
        $this->info = $info;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getSocialProfiles(): array
    {
        return $this->socialProfiles;
    }

    public function setSocialProfiles(array $socialProfiles): void
    {
        $this->socialProfiles = $socialProfiles;
    }

    /**
     * @return Collection|array<array-key,GroupInterface>
     */
    public function getGroups()
    {
        return $this->groups;
    }

    public function setGroups(Collection $groups): void
    {
        $this->groups = $groups;
    }

    public function getOrganization(): ?OrganizationReferenceInterface
    {
        return $this->organization;
    }

    public function setOrganization(OrganizationReferenceInterface $organization): void
    {
        $this->organization = $organization;
    }

    public function draft(): bool
    {
        return $this->draft;
    }

    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }

    /**
     * @return StatusInterface|Status|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param StatusInterface|Status|null $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
