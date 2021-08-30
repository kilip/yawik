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

use Symfony\Component\Serializer\Annotation\Groups;
use Yawik\Component\Organization\Model\Company;
use Yawik\Component\Organization\Model\Organization;
use Yawik\Component\User\Model\UserInterface;
use Yawik\Module\Resource\Contracts\ResourceInterface;
use Yawik\Module\Resource\Contracts\ResourceTrait;

class Job implements ResourceInterface
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

    protected Organization $organization;

    protected UserInterface $user;

    /**
     * @return Organization
     */
    public function getOrganization(): Organization
    {
        return $this->organization;
    }

    /**
     * @param Organization $organization
     */
    public function setOrganization(Organization $organization): void
    {
        $this->organization = $organization;
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

    public function isTermsAccepted(): bool
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted(bool $termsAccepted): void
    {
        $this->termsAccepted = $termsAccepted;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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
