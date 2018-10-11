<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Core\ORMEvents;
use Subapp\Orm\Extension\AbstractExtension;
use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Class Versionable
 * @package Subapp\Orm\Extension\EventSubscriber
 */
class Versionable extends AbstractExtension
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
        return 'versionable';
    }
    
    /**
     * @param EntityLifecycleEvent $event
     */
    public function beforePersist(EntityLifecycleEvent $event)
    {
        $this->resolveEntities($event, function (EntityInterface $entity, ParametersCollection $parameters) {
            foreach ($parameters->get('properties') as $propertyName) {
                $version = $entity->getByProperty($propertyName);
                $entity->setByProperty($propertyName, $version + 1);
            }
        });
    }
    
}