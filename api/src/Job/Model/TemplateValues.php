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

class TemplateValues
{
    /**
     * Qualification field of the job template.
     */
    protected ?string $qualifications = null;

    /**
     * Requirements field of the job template.
     */
    protected ?string $requirements = null;

    /**
     * Benefits field of the job template.
     */
    protected ?string $benefits = null;

    /**
     * Job title field of the job template.
     */
    protected ?string $title = null;

    /**
     * Company description field of the job template.
     */
    protected ?string $description = null;

    /**
     * language of the job template values. Must be a valid ISO 639-1 code.
     */
    protected string $language = 'en';

    /**
     * Pure HTML.
     */
    protected ?string $html = null;

    /**
     * Introduction text for the job template.
     */
    protected ?string $introduction = null;

    /**
     * Boilerplate (outro) text for the job template.
     */
    protected ?string $boilerplate = null;

    protected ?string $freeValues = null;

    public function getQualifications(): ?string
    {
        return $this->qualifications;
    }

    public function setQualifications(?string $qualifications): void
    {
        $this->qualifications = $qualifications;
    }

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(?string $requirements): void
    {
        $this->requirements = $requirements;
    }

    public function getBenefits(): ?string
    {
        return $this->benefits;
    }

    public function setBenefits(?string $benefits): void
    {
        $this->benefits = $benefits;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(?string $html): void
    {
        $this->html = $html;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(?string $introduction): void
    {
        $this->introduction = $introduction;
    }

    public function getBoilerplate(): ?string
    {
        return $this->boilerplate;
    }

    public function setBoilerplate(?string $boilerplate): void
    {
        $this->boilerplate = $boilerplate;
    }
}
