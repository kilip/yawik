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

/**
 * Job salary.
 */
class Salary
{
    public const UNIT_HOUR  = 'HOUR';
    public const UNIT_DAY   = 'DAY';
    public const UNIT_WEEK  = 'WEEK';
    public const UNIT_MONTH = 'MONTH';
    public const UNIT_YEAR  = 'YEAR';

    /**
     * The currency code.
     */
    protected ?string $currency = null;

    /**
     * Salary amount value.
     */
    protected float $value = 0.0;

    /**
     * Salary time interval unit.
     */
    protected ?string $unit = null;

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }


    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param string|null $unit
     */
    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }
}
