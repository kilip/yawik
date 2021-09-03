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
     * Qualification field of the job template
     */
    protected ?string $qualifications = null;

    /**
     * Requirements field of the job template
     */
    protected ?string $requirements = null;

    /**
     * Benefits field of the job template
     */
    protected ?string $benefits = null;

    /**
     * Job title field of the job template
     */
    protected ?string $title = null;

    /**
     * Company description field of the job template
     */
    protected ?string $description = null;

    /**
     * language of the job template values. Must be a valid ISO 639-1 code
     */
    protected string $language = 'en';

    /**
     * Pure HTML
     */
    protected ?string $html = null;

    /**
     * Introduction text for the job template
     */
    protected ?string $introduction = null;

    /**
     * Boilerplate (outro) text for the job template
     */
    protected ?string $boilerplate = null;

    protected ?string $freeValues = null;

    /**
     * @return string|null
     */
    public function getQualifications(): ?string
    {
        return $this->qualifications;
    }

    /**
     * @param string|null $qualifications
     */
    public function setQualifications(?string $qualifications): void
    {
        $this->qualifications = $qualifications;
    }

    /**
     * @return string|null
     */
    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    /**
     * @param string|null $requirements
     */
    public function setRequirements(?string $requirements): void
    {
        $this->requirements = $requirements;
    }

    /**
     * @return string|null
     */
    public function getBenefits(): ?string
    {
        return $this->benefits;
    }

    /**
     * @param string|null $benefits
     */
    public function setBenefits(?string $benefits): void
    {
        $this->benefits = $benefits;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string|null
     */
    public function getHtml(): ?string
    {
        return $this->html;
    }

    /**
     * @param string|null $html
     */
    public function setHtml(?string $html): void
    {
        $this->html = $html;
    }

    /**
     * @return string|null
     */
    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    /**
     * @param string|null $introduction
     */
    public function setIntroduction(?string $introduction): void
    {
        $this->introduction = $introduction;
    }

    /**
     * @return string|null
     */
    public function getBoilerplate(): ?string
    {
        return $this->boilerplate;
    }

    /**
     * @param string|null $boilerplate
     */
    public function setBoilerplate(?string $boilerplate): void
    {
        $this->boilerplate = $boilerplate;
    }
}
