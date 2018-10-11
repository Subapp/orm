<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Core\ORMEvents;
use Subapp\Orm\Extension\AbstractExtension;
use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Class ResourceLogger
 * @package Subapp\Orm\Extension\EventSubscriber
 */
class ResourceLogger extends AbstractExtension
{
    
    protected $entitiesStates;
    
    /**
     * @inheritDoc
     */
    public function __construct(ParametersCollection $configuration)
    {
        parent::__construct($configuration);
        
        $this->entitiesStates = new Collection();
    }
    
    /**
     * @inheritdoc
     */
    public function getEvents()
    {
        return [ORMEvents::beforePersist, ORMEvents::afterPersist];
    }
    
    /**
     * @inheritdoc
     */
    public function getNameNS()
    {
        return 'resourceLogger';
    }
    
    /**
     * @param EntityLifecycleEvent $event
     */
    public function beforePersist(EntityLifecycleEvent $event)
    {
        $entity = $event->getEntity();
        $states = $this->getEntitiesStates();
        
        $states->set($entity->hashCode(), $entity);
    }
    
    /**
     * @return Collection
     */
    public function getEntitiesStates()
    {
        return $this->entitiesStates;
    }
    
    /**
     * @param EntityLifecycleEvent $event
     */
    public function afterPersist(EntityLifecycleEvent $event)
    {
        $entity = $event->getEntity();
        $states = $this->getEntitiesStates();
        
        if (!$states->has($entity->hashCode())) {
            
        }
    }
    
}