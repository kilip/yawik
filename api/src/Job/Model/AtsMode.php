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

namespace Yawik\Job\Model;

/**
 * Application tracking setting of a job entity.
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
class AtsMode
{
    public const MODE_INTERN = 'intern';
    public const MODE_URI    = 'uri';
    public const MODE_EMAIL  = 'email';
    public const MODE_NONE   = 'none';

    /**
     * The ATS mode.
     */
    protected string $mode;

    /**
     * The uri to be used in MODE_URI.
     */
    protected string $uri;

    /**
     * The email to be used in MODE_EMAIL.
     */
    protected string $email;

    /**
     * One click apply flag.
     */
    protected bool $oneClickApply = false;

    /**
     * One click apply profiles.
     */
    protected array $oneClickApplyProfiles = [];

    /**
     * Creates a new instance.
     *
     * @param string      $mode       the ATS mode
     * @param string|null $uriOrEmail Provide the URI for MODE_URI or the email address for MODE_EMAIL. Is not used for MODE_INTERN and MODE_NONE.
     *
     * @uses setMode()
     * @uses setUri()
     * @uses setEmail()
     *
     * @throws \InvalidArgumentException if invalid mode is passed
     */
    public function __construct(string $mode = self::MODE_INTERN, ?string $uriOrEmail = null)
    {
        $this->setMode($mode);

        if (null !== $uriOrEmail) {
            if (self::MODE_URI == $mode) {
                $this->setUri($uriOrEmail);
            } elseif (self::MODE_EMAIL == $mode) {
                $this->setEmail($uriOrEmail);
            }
        }
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isOneClickApply(): bool
    {
        return $this->oneClickApply;
    }

    public function setOneClickApply(bool $oneClickApply): void
    {
        $this->oneClickApply = $oneClickApply;
    }

    public function getOneClickApplyProfiles(): array
    {
        return $this->oneClickApplyProfiles;
    }

    public function setOneClickApplyProfiles(array $oneClickApplyProfiles): void
    {
        $this->oneClickApplyProfiles = $oneClickApplyProfiles;
    }
}
