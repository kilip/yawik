<?php

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

    /**
     * @return IriConverterInterface
     */
    public function getIriConverter(): IriConverterInterface
    {
        return $this->iriConverter;
    }
}
