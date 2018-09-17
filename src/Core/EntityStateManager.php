<?php

namespace Subapp\Orm\Core;

use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Orm\Core\State\AbstractStateManager;
use Subapp\Orm\Core\State\State;
use Subapp\Orm\Core\State\StateIdentifier;

/**
 * Class EntityStateManager
 * @package Subapp\Orm\Core
 */
class EntityStateManager extends AbstractStateManager
{
    
    /**
     * @param EntityInterface     $entity
     * @param RepositoryInterface $repository
     *
     * @return $this
     */
    public function lock(EntityInterface $entity, RepositoryInterface $repository)
    {
        return $this->setStateFor(State::LOCKED, $entity, $repository);
    }
    
    /**
     * @param                     $state
     * @param EntityInterface     $entity
     * @param RepositoryInterface $repository
     *
     * @return $this
     */
    public function setStateFor($state, EntityInterface $entity, RepositoryInterface $repository)
    {
        $state = new State($state, new StateIdentifier($entity), new StateIdentifier($repository));
        
        $this->setState($state);
        
        return $this;
    }
    
    /**
     * @param EntityInterface     $entity
     * @param RepositoryInterface $repository
     *
     * @return $this
     */
    public function unlock(EntityInterface $entity, RepositoryInterface $repository)
    {
        return $this->setStateFor(State::UNLOCKED, $entity, $repository);
    }
    
}