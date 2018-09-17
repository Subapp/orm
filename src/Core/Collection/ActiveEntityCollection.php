<?php

namespace Subapp\Orm\Core\Collection;

use Subapp\Orm\Core\ActiveRecordInterface;
use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;

/**
 * Class ActiveEntityCollection
 *
 * @package Subapp\Orm\Core\Collection
 */
class ActiveEntityCollection extends EntityCollection implements ActiveRecordInterface
{
    
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    
    /**
     * ActiveEntityCollection constructor.
     *
     * @param RepositoryInterface $repository
     * @param array               $data
     */
    public function __construct(RepositoryInterface $repository, array $data)
    {
        parent::__construct($data);
        
        $this->repository = $repository;
    }
    
    /**
     * @return $this
     */
    public function save()
    {
        $repository = $this->getRepository();
        
        $this->each(function ($index, EntityInterface $entity) use ($repository) {
            $repository->persist($entity);
        });
        
        return $this;
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return $this
     */
    public function delete()
    {
        $repository = $this->getRepository();
        
        $this->each(function ($index, EntityInterface $entity) use ($repository) {
            $repository->remove($entity);
        });
        
        return $this;
    }
    
}