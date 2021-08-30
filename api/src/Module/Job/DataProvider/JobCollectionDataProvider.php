<?php

namespace Yawik\Module\Job\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Extension\AggregationCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Extension\AggregationResultCollectionExtensionInterface;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Yawik\Component\Job\Model\Job;
use Yawik\Component\Resource\Model\StatusInterface;

class JobCollectionDataProvider implements
    ContextAwareCollectionDataProviderInterface,
    RestrictedDataProviderInterface
{
    private ManagerRegistry $registry;
    private iterable $extensions;

    public function __construct(
        ManagerRegistry $registry,
        iterable $extensions
    )
    {
        $this->registry = $registry;
        $this->extensions = $extensions;
    }

    private array $supportedOperations = [
        'active_jobs'
    ];

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Job::class
            && in_array($operationName, $this->supportedOperations);
    }

    /**
     * @inheritDoc
     * @psalm-suppress MixedReturnStatement
     * @psalm-suppress MixedInferredReturnType
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $manager = $this->registry->getManagerForClass($resourceClass);
        /** @var DocumentRepository $repository */
        $repository = $manager->getRepository($resourceClass);
        $qb = $repository->createAggregationBuilder();

        $qb->match()->field('status.name')->in([StatusInterface::ACTIVE]);

        /** @var AggregationCollectionExtensionInterface $extension */
        foreach($this->extensions as $extension){
            $extension->applyToCollection($qb, $resourceClass, $operationName, $context);
            if(
                $extension instanceof AggregationResultCollectionExtensionInterface
                && $extension->supportsResult($resourceClass, $operationName, $context)
            ){
                return $extension->getResult($qb, $resourceClass, $operationName, $context);
            }
        }
    }

}
