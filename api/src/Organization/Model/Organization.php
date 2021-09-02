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

namespace Yawik\Organization\Model;

use Yawik\Resource\Model\ResourceTrait;
use Yawik\User\Model\UserInterface;

class Organization implements OrganizationInterface
{
    use ResourceTrait;
    /**
     * Always enabled even if there are no active jobs.
     */
    public const PROFILE_ALWAYS_ENABLE     = 'always';

    /**
     * Hide if there are no jobs available.
     */
    public const PROFILE_ACTIVE_JOBS       = 'active-jobs';

    /**
     * Always disabled profile.
     */
    public const PROFILE_DISABLED          = 'disabled';

    protected ?string $externalId;

    protected ?string $name;

    protected ?Image $image = null;

    // @TODO: handle image set
    //protected ?ImageSetInterface $images = null;

    protected bool $draft = false;

    protected ?Contact $contact = null;

    protected ?string $description = null;

    protected ?OrganizationInterface $parent = null;

    protected ?UserInterface $owner = null;

    protected ?TemplateInterface $template = null;

    protected ?WorkflowInterface $workflowSettings = null;

    protected ?string $profileSetting = null;

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): void
    {
        $this->image = $image;
    }

    public function isDraft(): bool
    {
        return $this->draft;
    }

    public function setDraft(bool $draft): void
    {
        $this->draft = $draft;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getParent(): ?OrganizationInterface
    {
        return $this->parent;
    }

    public function setParent(?OrganizationInterface $parent): void
    {
        $this->parent = $parent;
    }

    public function getOwner(): ?UserInterface
    {
        return $this->owner;
    }

    public function setOwner(?UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    public function getTemplate(): ?TemplateInterface
    {
        return $this->template;
    }

    public function setTemplate(?TemplateInterface $template): void
    {
        $this->template = $template;
    }

    public function getWorkflowSettings(): ?WorkflowInterface
    {
        return $this->workflowSettings;
    }

    public function setWorkflowSettings(?WorkflowInterface $workflowSettings): void
    {
        $this->workflowSettings = $workflowSettings;
    }

    public function getProfileSetting(): ?string
    {
        return $this->profileSetting;
    }

    public function setProfileSetting(?string $profileSetting): void
    {
        $this->profileSetting = $profileSetting;
    }
}
