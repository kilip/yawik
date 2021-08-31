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

namespace Yawik\Component\Job\Model;

use Yawik\Component\Resource\Model\ResourceInterface;
use Yawik\Component\Resource\Model\ResourceTrait;
use Yawik\Component\Resource\Model\StatusInterface;

class History
{
    protected \DateTimeInterface $date;
    protected StatusInterface $status;
    protected string $message;

    public function __construct(?StatusInterface $status = null)
    {
        if(!is_null($status)){
            $this->status = $status;
        }
        $this->setDate(new \DateTimeImmutable());
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
        if($date instanceof \DateTime){
            $date = \DateTimeImmutable::createFromMutable($date);
        }
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
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
