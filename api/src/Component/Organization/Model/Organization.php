<?php

namespace Yawik\Component\Organization\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Yawik\Component\User\Model\UserInterface;
use Yawik\Component\Resource\Model\ResourceInterface;
use Yawik\Component\Resource\Model\ResourceTrait;

class Organization implements
    ResourceInterface,
    OrganizationInterface
{
    use ResourceTrait;

    protected ?string $externalId = null;

    protected ?OrganizationName $organizationName = null;

    protected bool $draft = false;

    protected ?Contact $contact = null;

    protected ?string $description = null;

    /**
     * @var Collection|OrganizationInterface[]
     */
    protected $hiringOrganizations;

    /**
     * @var Collection|Employee[]
     */
    protected $employees;

    protected UserInterface $owner;

    protected ?Template $template = null;

    protected ?WorkflowSettingsInterface $workflowSettings = null;

    protected ?string $profileSetting = null;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->hiringOrganizations = new ArrayCollection();
        $this->organizationName = new OrganizationName();
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param string|null $externalId
     */
    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * @return OrganizationName|null
     */
    public function getOrganizationName(): ?OrganizationName
    {
        return $this->organizationName;
    }

    /**
     * @param OrganizationName|null $organizationName
     */
    public function setOrganizationName(?OrganizationName $organizationName): void
    {
        $this->organizationName = $organizationName;
    }

    /**
     * @return bool
     */
    public function isDraft(): bool
    {
        return $this->draft;
    }

    /**
     * @param bool $draft
     */
    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact|null $contact
     */
    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection|OrganizationInterface[]
     */
    public function getHiringOrganizations(): array|ArrayCollection|Collection
    {
        return $this->hiringOrganizations;
    }

    /**
     * @param Collection|OrganizationInterface[] $hiringOrganizations
     */
    public function setHiringOrganizations(array|ArrayCollection|Collection $hiringOrganizations): void
    {
        $this->hiringOrganizations = $hiringOrganizations;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployees(): ArrayCollection|array|Collection
    {
        return $this->employees;
    }

    /**
     * @param Collection|Employee[] $employees
     */
    public function setEmployees(ArrayCollection|array|Collection $employees): void
    {
        $this->employees = $employees;
    }

    /**
     * @return UserInterface
     */
    public function getOwner(): UserInterface
    {
        return $this->owner;
    }

    /**
     * @param UserInterface $owner
     */
    public function setOwner(UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return Template|null
     */
    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    /**
     * @param Template|null $template
     */
    public function setTemplate(?Template $template): void
    {
        $this->template = $template;
    }

    /**
     * @return WorkflowSettingsInterface|null
     */
    public function getWorkflowSettings(): ?WorkflowSettingsInterface
    {
        return $this->workflowSettings;
    }

    /**
     * @param WorkflowSettingsInterface|null $workflowSettings
     */
    public function setWorkflowSettings(?WorkflowSettingsInterface $workflowSettings): void
    {
        $this->workflowSettings = $workflowSettings;
    }

    /**
     * @return string|null
     */
    public function getProfileSetting(): ?string
    {
        return $this->profileSetting;
    }

    /**
     * @param string|null $profileSetting
     */
    public function setProfileSetting(?string $profileSetting): void
    {
        $this->profileSetting = $profileSetting;
    }
}
