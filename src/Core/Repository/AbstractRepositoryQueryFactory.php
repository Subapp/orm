<?php

namespace Subapp\Orm\Core\Repository;

use Subapp\Orm\Core\Domain\MetadataInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Sql;

/**
 * Abstract Class RepositoryQueryFactory
 * @package Subapp\Orm\Core\Repository
 */
abstract class AbstractRepositoryQueryFactory
{
    
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    
    /**
     * @return MetadataInterface
     */
    public function getEntityMetadata()
    {
        return $this->getRepository()->getEntityMetadata();
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @param RepositoryInterface $repository
     *
     * @return $this
     */
    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;
        
        return $this;
    }
    
    /**
     * @return Sql\Query\Query
     */
    public function createQuery()
    {
        return Sql\Sql::getInstance()->newQuery();
    }
    
    /**
     * @return Sql\Query\Query
     */
    public function createSelectQuery()
    {
        return $this->createQuery()->select($this->getEntityMetadata()->getTableName());
    }
    
    /**
     * @return Sql\Query\Query
     */
    public function createInsertQuery()
    {
        return $this->createQuery()->insert($this->getEntityMetadata()->getTableName());
    }
    
    /**
     * @return Sql\Query\Query
     */
    public function createDeleteQuery()
    {
        return $this->createQuery()->delete($this->getEntityMetadata()->getTableName());
    }
    
    /**
     * @return Sql\Query\Query
     */
    public function createUpdateQuery()
    {
        return $this->createQuery()->update($this->getEntityMetadata()->getTableName());
    }
    
}