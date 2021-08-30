<?php

namespace Yawik\Component\User\Model;

use Yawik\Component\Resource\Model\ResourceInterface;
use Yawik\Component\Resource\Model\ResourceTrait;

class User implements
    ResourceInterface,
    UserInterface
{
    use ResourceTrait;

    protected ?string $username = null;

    protected ?string $role = null;

    protected ?string $credential = null;

    protected ?string $email = null;

    protected ?string $secret = null;

    protected bool $draft = false;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(?string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string|null
     */
    public function getCredential(): ?string
    {
        return $this->credential;
    }

    /**
     * @param string|null $credential
     */
    public function setCredential(?string $credential): void
    {
        $this->credential = $credential;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @return bool
     */
    public function isDraft(): bool
    {
        return $this->draft;
    }

    /**
     * @param bool $draft
     */
    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }
}
