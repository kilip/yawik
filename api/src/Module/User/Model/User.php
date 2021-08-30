<?php

namespace Yawik\Module\User\Model;

use Symfony\Component\Security\Core\User\UserInterface;
use Yawik\Component\User\Model\User as BaseUser;

class User extends BaseUser implements UserInterface
{
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword(): ?string
    {
        return $this->getCredential();
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
