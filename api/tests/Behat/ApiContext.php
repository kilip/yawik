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

namespace Yawik\Tests\Behat;

use ApiPlatform\Core\Api\IriConverterInterface;
use Behat\Behat\Context\Context;

class ApiContext implements Context
{
    private IriConverterInterface $iriConverter;

    public function __construct(IriConverterInterface $iriConverter)
    {
        $this->iriConverter = $iriConverter;
    }

    public function getIriConverter(): IriConverterInterface
    {
        return $this->iriConverter;
    }
}
