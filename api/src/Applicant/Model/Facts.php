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

namespace Yawik\Applicant\Model;

class Facts
{
    /**
     * The expected salary.
     */
    protected ?string $expectedSalary = null;

    /**
     * The willingness to travel.
     */
    protected ?string $willingnessToTravel = null;

    /**
     * The earliest starting date.
     */
    protected ?string $earliestStartingDate  = null;

    /**
     * True if applicant have driving license.
     */
    protected bool $haveDrivingLicense = false;

    public function getExpectedSalary(): ?string
    {
        return $this->expectedSalary;
    }

    public function setExpectedSalary(?string $expectedSalary): void
    {
        $this->expectedSalary = $expectedSalary;
    }

    public function getWillingnessToTravel(): ?string
    {
        return $this->willingnessToTravel;
    }

    public function setWillingnessToTravel(?string $willingnessToTravel): void
    {
        $this->willingnessToTravel = $willingnessToTravel;
    }

    public function getEarliestStartingDate(): ?string
    {
        return $this->earliestStartingDate;
    }

    public function setEarliestStartingDate(?string $earliestStartingDate): void
    {
        $this->earliestStartingDate = $earliestStartingDate;
    }

    public function isHaveDrivingLicense(): bool
    {
        return $this->haveDrivingLicense;
    }

    public function setHaveDrivingLicense(bool $haveDrivingLicense): void
    {
        $this->haveDrivingLicense = $haveDrivingLicense;
    }
}
