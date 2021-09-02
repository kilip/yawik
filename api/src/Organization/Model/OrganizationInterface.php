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

use Yawik\User\Model\UserInterface;

interface OrganizationInterface
{
    public function getExternalId(): ?string;

    public function setExternalId(?string $externalId): void;

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getImage(): ?Image;

    public function setImage(?Image $image): void;

    public function isDraft(): bool;

    public function setDraft(bool $draft): void;

    public function getContact(): ?Contact;

    public function setContact(?Contact $contact): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    public function getParent(): ?self;

    public function setParent(?self $parent): void;

    public function getOwner(): ?UserInterface;

    public function setOwner(?UserInterface $owner): void;

    public function getTemplate(): ?TemplateInterface;

    public function setTemplate(?TemplateInterface $template): void;

    public function getWorkflowSettings(): ?WorkflowInterface;

    public function setWorkflowSettings(?WorkflowInterface $workflowSettings): void;

    public function getProfileSetting(): ?string;

    public function setProfileSetting(?string $profileSetting): void;
}
