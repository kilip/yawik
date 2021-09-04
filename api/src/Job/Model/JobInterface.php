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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yawik\Organization\Model\OrganizationInterface;
use Yawik\Resource\Model\ResourceInterface;
use Yawik\User\Model\UserInterface;

interface JobInterface extends ResourceInterface
{
    public function setCompany(?string $company): void;

    public function getCompany(): ?string;

    public function getApplyId(): ?string;

    public function setApplyId(string $applyId): void;

    public function getTitle(): ?string;

    public function setTitle(?string $title): void;

    public function getOrganization(): ?OrganizationInterface;

    public function setOrganization(?OrganizationInterface $organization): void;

    public function getContactEmail(): ?string;

    public function setContactEmail(?string $contactEmail): void;

    public function getOwner(): ?UserInterface;

    public function setOwner(?UserInterface $owner): void;

    public function getLanguage(): ?string;

    public function setLanguage(?string $language): void;

    public function getLocation(): ?string;

    public function setLocation(?string $location): void;

    /**
     * @return ArrayCollection|Collection|null
     */
    public function getLocations(): ArrayCollection|Collection|null;

    /**
     * @param ArrayCollection|Collection|null $locations
     */
    public function setLocations(ArrayCollection|Collection|null $locations): void;

    public function getLink(): ?string;

    public function setLink(?string $link): void;

    public function getDatePublishStart(): ?\DateTimeInterface;

    public function setDatePublishStart(?\DateTimeInterface $datePublishStart): void;

    public function getDatePublishEnd(): ?\DateTimeInterface;

    public function setDatePublishEnd(?\DateTimeInterface $datePublishEnd): void;

    public function getStatus(): ?Status;

    public function setStatus(?Status $status): void;

    /**
     * @return ArrayCollection|Collection
     */
    public function getHistory(): ArrayCollection|Collection;

    /**
     * @param ArrayCollection|Collection $history
     */
    public function setHistory(ArrayCollection|Collection $history): void;

    public function isTermsAccepted(): bool;

    public function setTermsAccepted(bool $termsAccepted): void;

    public function getReference(): ?string;

    public function setReference(?string $reference): void;

    public function getLogoRef(): ?string;

    public function setLogoRef(?string $logoRef): void;

    public function getTemplate(): ?string;

    public function setTemplate(?string $template): void;

    public function getUriApply(): ?string;

    public function setUriApply(?string $uriApply): void;

    public function getUriPublisher(): ?string;

    public function setUriPublisher(?string $uriPublisher): void;

    /**
     * @return Collection|Publisher[]
     *
     * @psalm-return Collection|array<Publisher>
     */
    public function getPublishers(): array|Collection;

    public function setPublishers(Collection $publishers): void;

    public function getAtsMode(): ?AtsMode;

    public function setAtsMode(?AtsMode $atsMode): void;

    public function isAtsEnabled(): bool;

    public function setAtsEnabled(bool $atsEnabled): void;

    public function getSalary(): ?Salary;

    public function setSalary(?Salary $salary): void;

    public function getTemplateValues(): ?TemplateValues;

    public function setTemplateValues(?TemplateValues $templateValues): void;

    public function getPortals(): array;

    public function setPortals(array $portals): void;

    public function isDraft(): bool;

    public function setDraft(bool $draft): void;

    public function getClassification(): ?Classification;

    public function setClassification(?Classification $classification): void;

    public function isDeleted(): bool;

    public function setDeleted(bool $deleted): void;
}
