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

namespace Yawik\Resource\Model;

abstract class History
{
    protected \DateTimeInterface $date;

    /**
     * Status of an application.
     */
    protected StatusInterface $status;

    /**
     * optional message, which can attached to a status change.
     */
    protected string $message;

    public function __construct(StatusInterface $status, string $message = '[System]')
    {
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setDate(new \DateTime());
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    public function getStatus(): StatusInterface
    {
        return $this->status;
    }

    public function setStatus(StatusInterface $status): void
    {
        $this->status = $status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
