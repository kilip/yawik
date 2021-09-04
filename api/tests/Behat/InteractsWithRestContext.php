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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behatch\Context\RestContext;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGeneratorInterfaceAlias;

trait InteractsWithRestContext
{
    protected RestContext $restContext;
    protected ApiContext $apiContext;

    /**
     * @BeforeScenario
     */
    public function gatherRestContext(BeforeScenarioScope $scope)
    {
        $this->restContext = $scope->getEnvironment()->getContext(RestContext::class);
        $this->apiContext  = $scope->getEnvironment()->getContext(ApiContext::class);
    }

    protected function getIriFromItem(object $item): string
    {
        return $this->apiContext->getIriConverter()->getIriFromItem($item);
    }

    protected function getUrlFor(string $routeName, array $parameters = [], $referenceType = UrlGeneratorInterfaceAlias::ABSOLUTE_PATH): string
    {
        $router = $this->getContainer()->get('router');

        return $router->generate($routeName, $parameters, $referenceType);
    }
}
