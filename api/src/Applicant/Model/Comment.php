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

namespace Yawik\Applicant\Model;

use Yawik\User\Model\UserInterface;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Applicant comment entity.
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
class Comment
{
    /**
     * User this comment belongs to.
     */
    protected UserInterface $createdBy;

    /**
     * Created date.
     * @Gedmo\Timestampable(on="create")
     */
    protected \DateTimeInterface $dateCreated;

    /**
     * Modification date.
     * @Gedmo\Timestampable(on="update")
     */
    protected \DateTimeInterface $dateModified;

    /**
     * Comment message.
     */
    protected string $message;

    /**
     * Application rating.
     */
    protected Rating $rating;

    public function getCreatedBy(): UserInterface
    {
        return $this->createdBy;
    }

    public function setCreatedBy(UserInterface $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getDateCreated(): \DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }

    public function getDateModified(): \DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(\DateTimeInterface $dateModified): void
    {
        $this->dateModified = $dateModified;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getRating(): Rating
    {
        return $this->rating;
    }

    public function setRating(Rating $rating): void
    {
        $this->rating = $rating;
    }
}
