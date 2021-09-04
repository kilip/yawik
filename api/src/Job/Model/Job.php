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
use Yawik\Applicant\Model\Applicant;
use Yawik\Organization\Model\OrganizationInterface;
use Yawik\Resource\Model\ResourceTrait;
use Yawik\User\Model\UserInterface;

class Job implements JobInterface
{
    use ResourceTrait;

    /**
     * unique ID of a job posting used by applications
     * to reference a job.
     */
    protected ?string $applyId = null;

    /**
     * title of a job posting.
     */
    protected ?string $title = null;

    /**
     * name of the publishing company.
     */
    protected ?string $company = null;

    /**
     * publishing company.
     */
    protected ?OrganizationInterface $organization = null;

    /**
     * Email Address, which is used to send notifications about e.g. new applications.
     */
    protected ?string $contactEmail = null;

    /**
     * the owner of a Job Posting.
     */
    protected ?UserInterface $owner = null;

    /**
     * language of the job posting. Languages are ISO 639-1 coded.
     */
    protected ?string $language = null;

    /**
     * location of the job posting. This is a plain text,
     * which describes the location in
     * search e.g. results.
     */
    protected ?string $location = null;

    /**
     * locations of the job posting. This collection contains structured coordinates,
     * postal codes, city, region, and country names.
     */
    protected ?Collection $locations = null;

    /**
     * Link which points to the job posting.
     */
    protected ?string $link = null;

    /**
     * publishing date of a job posting.
     */
    protected ?\DateTimeInterface $datePublishStart = null;

    /**
     * end date of a job posting.
     */
    protected ?\DateTimeInterface $datePublishEnd = null;

    /**
     * Status of the job posting.
     */
    protected ?Status $status = null;

    /**
     * History on a job posting.
     */
    protected Collection $history;

    /**
     * Flag, privacy policy is accepted or not.
     */
    protected bool $termsAccepted = false;

    /**
     * Reference of a job opening, on which an applicant can refer to.
     */
    protected ?string $reference = null;

    /**
     * Unified Resource Locator to the company-Logo.
     */
    protected ?string $logoRef = null;

    /**
     * Template-Name.
     */
    protected ?string $template = null;

    /**
     * Application link.
     */
    protected ?string $uriApply = null;

    /**
     * Unified Resource Locator the Yawik, which handled this job first - so
     * does know who is the one who has committed this job.
     */
    protected ?string $uriPublisher = null;

    /**
     * Publisher for this job.
     *
     * @var Collection|Publisher[]
     */
    protected iterable $publishers;

    /**
     * The ATS mode entity.
     */
    protected ?AtsMode $atsMode = null;

    /**
     * this must be enabled to use applications forms etc. for this job or
     * to see number of applications in the list of applications.
     */
    protected bool $atsEnabled = false;

    /**
     * The Salary entity.
     */
    protected ?Salary $salary = null;

    /**
     * The actual name of the organization.
     */
    protected ?TemplateValues $templateValues = null;

    /**
     * Can contain various Portals.
     */
    protected array $portals = [];

    /**
     * Flag indicating draft state of this job.
     */
    protected bool $draft = false;

    /**
     * Job classification.
     */
    protected ?Classification $classification = null;

    /**
     * Delete flag.
     *
     * @internal
     *      This is meant as a temporary flag, until
     *      SoftDelete is implemented
     */
    protected bool $deleted = false;

    public function __construct()
    {
        $this->history    = new ArrayCollection();
        $this->locations  = new ArrayCollection();
        $this->portals    = [];
        $this->publishers = new ArrayCollection();
    }

    public function getCompany(): ?string
    {
        $company = $this->company;

        if (null === $company && $this->organization instanceof OrganizationInterface) {
            $company = $this->organization->getName();
        }

        return $company;
    }

    /**
     * @psalm-suppress NullableReturnStatement
     */
    public function getApplyId(): ?string
    {
        if (null === $this->applyId) {
            $this->setApplyId($this->id);
        }

        return $this->applyId;
    }

    public function setApplyId(?string $applyId): void
    {
        $this->applyId = $applyId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    public function getOrganization(): ?OrganizationInterface
    {
        return $this->organization;
    }

    public function setOrganization(?OrganizationInterface $organization): void
    {
        $this->organization = $organization;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    public function getOwner(): ?UserInterface
    {
        return $this->owner;
    }

    public function setOwner(?UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return ArrayCollection|Collection|null
     */
    public function getLocations(): ArrayCollection|Collection|null
    {
        return $this->locations;
    }

    /**
     * @param ArrayCollection|Collection|null $locations
     */
    public function setLocations(ArrayCollection|Collection|null $locations): void
    {
        $this->locations = $locations;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    public function getDatePublishStart(): ?\DateTimeInterface
    {
        return $this->datePublishStart;
    }

    public function setDatePublishStart(?\DateTimeInterface $datePublishStart): void
    {
        $this->datePublishStart = $datePublishStart;
    }

    public function getDatePublishEnd(): ?\DateTimeInterface
    {
        return $this->datePublishEnd;
    }

    public function setDatePublishEnd(?\DateTimeInterface $datePublishEnd): void
    {
        $this->datePublishEnd = $datePublishEnd;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): void
    {
        $this->status = $status;
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

    public function isTermsAccepted(): bool
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted(bool $termsAccepted): void
    {
        $this->termsAccepted = $termsAccepted;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getLogoRef(): ?string
    {
        return $this->logoRef;
    }

    public function setLogoRef(?string $logoRef): void
    {
        $this->logoRef = $logoRef;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(?string $template): void
    {
        $this->template = $template;
    }

    public function getUriApply(): ?string
    {
        return $this->uriApply;
    }

    public function setUriApply(?string $uriApply): void
    {
        $this->uriApply = $uriApply;
    }

    public function getUriPublisher(): ?string
    {
        return $this->uriPublisher;
    }

    public function setUriPublisher(?string $uriPublisher): void
    {
        $this->uriPublisher = $uriPublisher;
    }

    /**
     * @return Collection|Publisher[]
     *
     * @psalm-return Collection|array<Publisher>
     */
    public function getPublishers(): array|Collection
    {
        return $this->publishers;
    }

    public function setPublishers(Collection $publishers): void
    {
        $this->publishers = $publishers;
    }

    public function getAtsMode(): ?AtsMode
    {
        return $this->atsMode;
    }

    public function setAtsMode(?AtsMode $atsMode): void
    {
        $this->atsMode = $atsMode;
    }

    public function isAtsEnabled(): bool
    {
        return $this->atsEnabled;
    }

    public function setAtsEnabled(bool $atsEnabled): void
    {
        $this->atsEnabled = $atsEnabled;
    }

    public function getSalary(): ?Salary
    {
        return $this->salary;
    }

    public function setSalary(?Salary $salary): void
    {
        $this->salary = $salary;
    }

    public function getTemplateValues(): ?TemplateValues
    {
        return $this->templateValues;
    }

    public function setTemplateValues(?TemplateValues $templateValues): void
    {
        $this->templateValues = $templateValues;
    }

    public function getPortals(): array
    {
        return $this->portals;
    }

    public function setPortals(array $portals): void
    {
        $this->portals = $portals;
    }

    public function isDraft(): bool
    {
        return $this->draft;
    }

    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }

    public function getClassification(): ?Classification
    {
        return $this->classification;
    }

    public function setClassification(?Classification $classification): void
    {
        $this->classification = $classification;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}
