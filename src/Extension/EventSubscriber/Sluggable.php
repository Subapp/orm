<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Behat\Transliterator\Transliterator;
use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Core\ORMEvents;
use Subapp\Orm\Extension\AbstractExtension;
use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Class Sluggable
 * @package Subapp\Orm\Extension\EventSubscriber
 */
class Sluggable extends AbstractExtension
{
    
    /**
     * @return array
     */
    public function getEvents()
    {
        return [ORMEvents::beforePersist];
    }
    
    /**
     * @inheritDoc
     */
    public function getNameNS()
    {
        return 'sluggable';
    }
    
    /**
     * @param EntityLifecycleEvent $event
     */
    public function beforePersist(EntityLifecycleEvent $event)
    {
        foreach ($this->getConfiguration() as $entityClassName => $propertyConfiguration) {
            if ($event->getEntity() instanceof $entityClassName) {
                $entity = $event->getEntity();
                foreach ($propertyConfiguration as $propertyName => $configuration) {
                    $entity->setByProperty($propertyName, $this->getSlugForEntity($entity, $configuration));
                }
            }
        }
    }
    
    /**
     * @param EntityInterface      $entity
     * @param ParametersCollection $configuration
     *
     * @return array
     */
    protected function getSlugForEntity(EntityInterface $entity, ParametersCollection $configuration)
    {
        $parts = [];
        
        foreach ($configuration->offsetGet('properties') as $property) {
            if ($entity->hasProperty($property)) {
                $parts[] = Transliterator::urlize(Transliterator::transliterate($entity->getByProperty($property)));
            }
        }
        
        $string = implode($configuration->offsetGet('separator'), $parts);
        
        return sprintf('%s%s%s', $configuration->get('prefix'), $string, $configuration->get('suffix'));
    }
    
}