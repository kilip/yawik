<?php

namespace Yawik\Component\Job\Model;

use Yawik\Component\Organization\Model\Organization;
use Yawik\Component\Resource\Model\ResourceInterface;
use Yawik\Component\User\Model\UserInterface;

interface JobInterface extends ResourceInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @return string|null
     */
    public function getApplyId(): ?string;

    /**
     * @param string|null $applyId
     */
    public function setApplyId(?string $applyId): void;

    /**
     * @return string|null
     */
    public function getCompany(): ?string;

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void;

    /**
     * @return string
     */
    public function getContactEmail(): string;

    /**
     * @param string $contactEmail
     */
    public function setContactEmail(string $contactEmail): void;

    /**
     * @return string|null
     */
    public function getLanguage(): ?string;

    /**
     * @param string|null $language
     */
    public function setLanguage(?string $language): void;

    /**
     * @return string|null
     */
    public function getLink(): ?string;

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void;

    /**
     * @return \DateTimeInterface|null
     */
    public function getDatePublishStart(): ?\DateTimeInterface;

    /**
     * @param \DateTimeInterface|null $datePublishStart
     */
    public function setDatePublishStart(?\DateTimeInterface $datePublishStart): void;

    /**
     * @return \DateTimeInterface|null
     */
    public function getDatePublishEnd(): ?\DateTimeInterface;

    /**
     * @param \DateTimeInterface|null $datePublishEnd
     */
    public function setDatePublishEnd(?\DateTimeInterface $datePublishEnd): void;

    /**
     * @return bool
     */
    public function isTermsAccepted(): bool;

    /**
     * @param bool $termsAccepted
     */
    public function setTermsAccepted(bool $termsAccepted): void;

    /**
     * @return string|null
     */
    public function getReference(): ?string;

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void;

    /**
     * @return Status
     */
    public function getStatus(): Status;

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void;

    /**
     * @return History
     */
    public function getHistory(): History;

    /**
     * @param History $history
     */
    public function setHistory(History $history): void;

    /**
     * @return Organization|null
     */
    public function getOrganization(): ?Organization;

    /**
     * @param Organization|null $organization
     */
    public function setOrganization(?Organization $organization): void;

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user): void;
}
