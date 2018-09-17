<?php

namespace Subapp\Orm\EventDispatcher;

/**
 * Interface EventInterface
 * @package Subapp\Orm\EventDispatcher
 */
interface EventInterface
{
    
    /**
     * @return bool
     */
    public function isStopped(): bool;
    
    /**
     * @return EventInterface
     */
    public function stop(): EventInterface;
    
    /**
     * @return string
     */
    public function getName(): string;
    
    /**
     * @param string $name
     *
     * @return EventInterface
     */
    public function setName(string $name): EventInterface;
    
}