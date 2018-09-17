<?php

namespace Subapp\Orm\Extension\EventSubscriber;

use Subapp\Orm\Core\ORMEvents;
use Subapp\Orm\Extension\AbstractExtension;

/**
 * Class AbstractDataFilter
 * @package Subapp\Orm\Extension\EventSubscriber
 */
abstract class AbstractDataFilter extends AbstractExtension
{
    
    /**
     * @return array
     */
    public function getEvents()
    {
        return [ORMEvents::beforePersist];
    }
    
}