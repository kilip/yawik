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

use Yawik\Component\Organization\Model\Organization;
use Yawik\Component\User\Model\UserInterface;
use Yawik\Component\Resource\Model\ResourceTrait;

class Job implements JobInterface
{
    use ResourceTrait;

    protected string $title;

    protected ?string $applyId = null;

    protected ?string $company = null;

    protected string $contactEmail;

    protected ?string $language = null;

    protected ?string $link = null;

    protected ?\DateTimeInterface $datePublishStart = null;

    protected ?\DateTimeInterface $datePublishEnd = null;

    protected bool $termsAccepted = false;

    protected ?string $reference = null;

    protected Status $status;

    protected History $history;

    protected ?Organization $organization = null;

    protected UserInterface $user;

    public function __construct()
    {
        $this->status = new Status();
        $this->history = new History($this->status);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getApplyId(): ?string
    {
        return $this->applyId;
    }

    /**
     * @param string|null $applyId
     */
    public function setApplyId(?string $applyId): void
    {
        $this->applyId = $applyId;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail(string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDatePublishStart(): ?\DateTimeInterface
    {
        return $this->datePublishStart;
    }

    /**
     * @param \DateTimeInterface|null $datePublishStart
     */
    public function setDatePublishStart(?\DateTimeInterface $datePublishStart): void
    {
        $this->datePublishStart = $datePublishStart;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDatePublishEnd(): ?\DateTimeInterface
    {
        return $this->datePublishEnd;
    }

    /**
     * @param \DateTimeInterface|null $datePublishEnd
     */
    public function setDatePublishEnd(?\DateTimeInterface $datePublishEnd): void
    {
        $this->datePublishEnd = $datePublishEnd;
    }

    /**
     * @return bool
     */
    public function isTermsAccepted(): bool
    {
        return $this->termsAccepted;
    }

    /**
     * @param bool $termsAccepted
     */
    public function setTermsAccepted(bool $termsAccepted): void
    {
        $this->termsAccepted = $termsAccepted;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return History
     */
    public function getHistory(): History
    {
        return $this->history;
    }

    /**
     * @param History $history
     */
    public function setHistory(History $history): void
    {
        $this->history = $history;
    }

    /**
     * @return Organization|null
     */
    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    /**
     * @param Organization|null $organization
     */
    public function setOrganization(?Organization $organization): void
    {
        $this->organization = $organization;
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
}
