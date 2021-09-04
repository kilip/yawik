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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yawik\Job\Model\JobInterface;
use Yawik\Resource\Model\ResourceInterface;
use Yawik\Resource\Model\ResourceTrait;
use Yawik\Resource\Model\StatusInterface;
use Yawik\User\Model\UserInterface;

class Applicant implements ResourceInterface
{
    use ResourceTrait;

    /**
     * Referring job.
     */
    protected JobInterface $job;

    /**
     * User, who owns the application.
     */
    protected ?UserInterface $owner = null;

    /**
     * Status of an application.
     */
    protected ?StatusInterface $status = null;

    /**
     * personal informations, contains firstname, lastname, email,
     * phone etc.
     */
    protected ?Contact $contact = null;

    /**
     * The cover letter of an application.
     */
    protected ?string $summary = null;

    /**
     * The facts of this application.
     */
    protected ?Facts $facts = null;

    /**
     * Resume, containing employments, educations and skills.
     */
    protected ?Resume $resume = null;

    /**
     * multiple Attachments of an application.
     */
    protected Collection $attachments;

    /**
     * Searchable keywords.
     */
    protected array $keywords = [];

    /**
     * History on an application.
     */
    protected Collection $history;

    /**
     * Who has opened the detail view of the application.
     * Contains an array of user ids, which has read this application.
     */
    protected array $readBy = [];

    /**
     * Referring subscriber (Where did the application origin from).
     */
    protected ?Subscriber $subscriber = null;

    /**
     * Recruiters can comment an application.
     */
    protected Collection $comments;

    /**
     * Average rating from all comments.
     */
    protected int $rating = 0;

    /**
     * Internal references (DB de-naturalism).
     */
    protected ?InternalReferences $refs = null;

    /**
     * Collection of social network profiles.
     */
    protected Collection $socialProfiles;

    /**
     * Flag indicating draft state of this application.
     */
    protected bool $draft = false;

    /**
     * Attributes like "privacy policy accepted" or "send by data as an CC".
     */
    protected ?Attributes $attributes = null;

    public function __construct()
    {
        $this->attachments    = new ArrayCollection();
        $this->history        = new ArrayCollection();
        $this->comments       = new ArrayCollection();
        $this->socialProfiles = new ArrayCollection();
        $this->status         = new Status();
    }

    public function getJob(): JobInterface
    {
        return $this->job;
    }

    public function setJob(JobInterface $job): void
    {
        $this->job = $job;
    }

    public function getOwner(): ?UserInterface
    {
        return $this->owner;
    }

    public function setOwner(?UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return Status|StatusInterface|null
     */
    public function getStatus(): StatusInterface|Status|null
    {
        return $this->status;
    }

    /**
     * @param Status|StatusInterface|null $status
     */
    public function setStatus(StatusInterface|Status|null $status): void
    {
        $this->status = $status;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    public function getFacts(): ?Facts
    {
        return $this->facts;
    }

    public function setFacts(?Facts $facts): void
    {
        $this->facts = $facts;
    }

    public function getResume(): ?Resume
    {
        return $this->resume;
    }

    public function setResume(?Resume $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getAttachments(): ArrayCollection|Collection
    {
        return $this->attachments;
    }

    /**
     * @param ArrayCollection|Collection $attachments
     */
    public function setAttachments(ArrayCollection|Collection $attachments): void
    {
        $this->attachments = $attachments;
    }

    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function setKeywords(array $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getHistory(): ArrayCollection|Collection
    {
        return $this->history;
    }

    /**
     * @param ArrayCollection|Collection $history
     */
    public function setHistory(ArrayCollection|Collection $history): void
    {
        $this->history = $history;
    }

    public function getReadBy(): array
    {
        return $this->readBy;
    }

    public function setReadBy(array $readBy): void
    {
        $this->readBy = $readBy;
    }

    public function getSubscriber(): ?Subscriber
    {
        return $this->subscriber;
    }

    public function setSubscriber(?Subscriber $subscriber): void
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getComments(): ArrayCollection|Collection
    {
        return $this->comments;
    }

    /**
     * @param ArrayCollection|Collection $comments
     */
    public function setComments(ArrayCollection|Collection $comments): void
    {
        $this->comments = $comments;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getRefs(): ?InternalReferences
    {
        return $this->refs;
    }

    public function setRefs(?InternalReferences $refs): void
    {
        $this->refs = $refs;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getSocialProfiles(): ArrayCollection|Collection
    {
        return $this->socialProfiles;
    }

    /**
     * @param ArrayCollection|Collection $socialProfiles
     */
    public function setSocialProfiles(ArrayCollection|Collection $socialProfiles): void
    {
        $this->socialProfiles = $socialProfiles;
    }

    public function isDraft(): bool
    {
        return $this->draft;
    }

    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }

    public function getAttributes(): ?Attributes
    {
        return $this->attributes;
    }

    public function setAttributes(?Attributes $attributes): void
    {
        $this->attributes = $attributes;
    }
}
