<?php

namespace Subapp\Orm\EventDispatcher;

/**
 * Interface EventSubscriber
 * @package Subapp\Orm\EventDispatcher
 */
interface EventSubscriber
{
    
    /**
     * @return array
     */
    public function getEvents();
    
}