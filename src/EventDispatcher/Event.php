<?php

namespace Subapp\Orm\EventDispatcher;

/**
 * Class Event
 * @package Subapp\Orm\EventDispatcher
 */
class Event implements EventInterface
{
    
    /**
     * @var bool
     */
    protected $stopped = false;
    
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @return bool
     */
    public function isStopped(): bool
    {
        return $this->stopped;
    }
    
    /**
     * @return EventInterface
     */
    public function stop(): EventInterface
    {
        $this->stopped = true;
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @inheritDoc
     */
    public function setName(string $name): EventInterface
    {
        $this->name = $name;
        
        return $this;
    }
    
}