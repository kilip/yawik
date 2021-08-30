<?php

namespace Yawik\Component\Organization\Model;

class Template
{
    protected string $requirements = 'Requirements';
    protected string $qualifications = 'Qualifications';
    protected string $benefits = 'Benefits';

    /**
     * @return string
     */
    public function getRequirements(): string
    {
        return $this->requirements;
    }

    /**
     * @param string $requirements
     */
    public function setRequirements(string $requirements): void
    {
        $this->requirements = $requirements;
    }

    /**
     * @return string
     */
    public function getQualifications(): string
    {
        return $this->qualifications;
    }

    /**
     * @param string $qualifications
     */
    public function setQualifications(string $qualifications): void
    {
        $this->qualifications = $qualifications;
    }

    /**
     * @return string
     */
    public function getBenefits(): string
    {
        return $this->benefits;
    }

    /**
     * @param string $benefits
     */
    public function setBenefits(string $benefits): void
    {
        $this->benefits = $benefits;
    }
}
