<?php

namespace Subapp\Orm\Core\Event;

use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;

/**
 * Class EntityLifecycleEvent
 * @package Subapp\Orm\Core\Event
 */
class EntityLifecycleEvent extends AbstractEvent
{
    
    /**
     * @var EntityInterface
     */
    protected $entity;
    
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    
    /**
     * EntityLifecycleEvent constructor.
     *
     * @param RepositoryInterface $repository
     * @param EntityInterface     $entity
     */
    public function __construct(RepositoryInterface $repository, EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->repository = $repository;
    }
    
    /**
     * @return EntityInterface
     */
    public function getEntity()
    {
        return $this->entity;
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
}