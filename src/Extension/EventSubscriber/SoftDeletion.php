<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Core\ORMEvents;
use Subapp\Orm\Core\Repository\AbstractRepositoryQueryFactory;
use Subapp\Orm\Extension\AbstractExtension;

/**
 * Class SoftDeletion
 * @package Subapp\Orm\Extension\EventSubscriber
 */
class SoftDeletion extends AbstractExtension
{
    
    /**
     * @param EntityLifecycleEvent $lifecycleEvent
     */
    public function beforeRemove(EntityLifecycleEvent $lifecycleEvent)
    {
        $lifecycleEvent->getRepository()->getQueryFactory();
        $lifecycleEvent->getRepository()->setQueryFactory(new class extends AbstractRepositoryQueryFactory
        {
            
            /**
             * @inheritDoc
             */
            public function createDeleteQuery()
            {
                return parent::createUpdateQuery();
            }
            
        });
    }
    
    /**
     * @return array
     */
    public function getEvents()
    {
        return [ORMEvents::beforeRemove,];
    }
    
    /**
     * @return string
     */
    public function getNameNS()
    {
        return 'softDeletion';
    }
    
}