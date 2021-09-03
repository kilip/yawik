<?php

namespace Yawik\Resource\Model;

abstract class History
{
    protected \DateTimeInterface $date;

    /**
     * Status of an application.
     */
    protected StatusInterface $status;

    /**
     * optional message, which can attached to a status change
     */
    protected string $message;

    public function __construct(StatusInterface $status, string $message = '[System]')
    {
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setDate(new \DateTime());
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     */
    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return StatusInterface
     */
    public function getStatus(): StatusInterface
    {
        return $this->status;
    }

    /**
     * @param StatusInterface $status
     */
    public function setStatus(StatusInterface $status): void
    {
        $this->status = $status;
    }

    /**
     * @return String
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param String $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
