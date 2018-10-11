<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Subapp\Collection\Parameters\ParametersCollection;
use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Filters\FilterInterface;

/**
 * Class DataFilter
 * @package Subapp\Orm\Extension\EventSubscriber
 */
class DataFilter extends AbstractDataFilter
{
    
    /**
     * @inheritDoc
     */
    public function getNameNS()
    {
        return 'dataFilter';
    }
    
    /**
     * @param EntityLifecycleEvent $event
     */
    public function beforePersist(EntityLifecycleEvent $event)
    {
        $this->resolveEntities($event, function (EntityInterface $entity, ParametersCollection $parameters) {
            /** @var ParametersCollection $configuration */
            foreach ($parameters as $propertyName => $configuration) {
                if ($entity->hasProperty($propertyName) && $configuration->offsetExists('filters')) {
                    $propertyData = $entity->getByProperty($propertyName);
                    $propertyData = $this->applyFilters($propertyData, $configuration->offsetGet('filters')->toArray());
                    $entity->setByProperty($propertyName, $propertyData);
                }
            }
        });
    }
    
    /**
     * @param       $propertyData
     * @param array $filterClasses
     *
     * @return array|int|string
     */
    protected function applyFilters(&$propertyData, array $filterClasses)
    {
        /** @var FilterInterface $filter */
        foreach ($filterClasses as $filterClass => $filterClassArguments) {
            $filter = new $filterClass(...$filterClassArguments);

            if (!($filter instanceof FilterInterface)) {
                throw new \RuntimeException(sprintf('Filter %s must implement %s interface',
                    $filterClass, FilterInterface::class));
            }

            $propertyData = $filter->apply($propertyData);
        }
        
        return $propertyData;
    }
    
}