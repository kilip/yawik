<?php

namespace Yawik\Tests\Behat;

use ApiPlatform\Core\Api\UrlGeneratorInterface;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behatch\Context\RestContext;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGeneratorInterfaceAlias;
use Symfony\Component\Routing\RouterInterface;

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
        $this->apiContext = $scope->getEnvironment()->getContext(ApiContext::class);
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
