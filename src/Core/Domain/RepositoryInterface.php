<?php

namespace Subapp\Orm\Core\Domain;

use Subapp\Orm\Connection\ConnectionInterface;
use Subapp\Orm\Connection\Statement\StatementIterator;
use Subapp\Orm\Connection\StmtInterface;
use Subapp\Orm\Core\ClassManager;
use Subapp\Orm\Core\Hydrator\AbstractHydratorEntity;
use Subapp\Orm\Core\Repository\AbstractRepositoryQueryFactory;
use Subapp\Orm\Core\ResultSet\ResultSet;
use Subapp\Orm\Core\Storage\FinderInterface;
use Subapp\Orm\Core\Storage\PersisterInterface;
use Subapp\Orm\Core\Storage\RemoverInterface;
use Subapp\Orm\EventDispatcher\DispatcherInterface;
use Subapp\Orm\EventDispatcher\EventInterface;
use Subapp\Orm\Exception\NotFoundException;
use Subapp\Orm\Query\Builder\Delete;
use Subapp\Orm\Query\Builder\Insert;
use Subapp\Orm\Query\Builder\Select;
use Subapp\Orm\Query\Builder\Select as SelectQueryBuilder;
use Subapp\Orm\Query\Builder\Update;
use Subapp\Orm\ServiceContainer\ServiceLocatorInterface;

/**
 * Interface RepositoryInterface
 * @package Subapp\Orm\Core\Domain
 */
interface RepositoryInterface
{
    
    /**
     * @param array $criteria
     *
     * @return StmtInterface
     */
    public function find(array $criteria);
    
    /**
     * @param $criteria
     *
     * @return mixed
     */
    public function findFirst($criteria);
    
    /**
     * @param $criteria
     *
     * @return mixed
     */
    public function findOneBy($criteria);
    
    /**
     * @return mixed
     */
    public function findAll();
    
    /**
     * @param mixed $criteria
     *
     * @return ResultSet
     */
    public function findBy($criteria);
    
    /**
     * @param $criteria
     *
     * @return $this
     */
    public function filterBy($criteria);
    
    /**
     * @param integer $id
     *
     * @return EntityInterface
     */
    public function retrieve($id);
    
    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function persist(EntityInterface $entity);
    
    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    public function remove(EntityInterface $entity);
    
    /**
     * @return string
     */
    public function getEntityName();
    
    /**
     * @return \ReflectionClass|\ReflectionObject
     */
    public function getEntityClassReflection();
    
    /**
     * @return string
     * @throws NotFoundException
     */
    public function getEntityIdentifier();
    
    /**
     * @return MetadataInterface
     */
    public function getEntityMetadata();
    
    /**
     * @return SelectQueryBuilder
     */
    public function getQuery();
    
    /**
     * @return ClassManager
     */
    public function getClassManager();
    
    /**
     * @return ConnectionInterface
     */
    public function getConnection();
    
    /**
     * @return AbstractHydratorEntity
     */
    public function getHydrator();
    
    /**
     * @param AbstractHydratorEntity $hydrator
     *
     * @return $this
     */
    public function setHydrator(AbstractHydratorEntity $hydrator);
    
    /**
     * @return DispatcherInterface
     */
    public function getEventDispatcher();
    
    /**
     * @param                     $eventName
     * @param EventInterface|null $event
     *
     * @return $this
     */
    public function dispatchEvent($eventName, EventInterface $event = null);
    
    /**
     * @param $class
     *
     * @return RepositoryInterface
     */
    public function getRepositoryFor($class);
    
    /**
     * @return AbstractRepositoryQueryFactory
     */
    public function getQueryFactory();
    
    /**
     * @param AbstractRepositoryQueryFactory $queryFactory
     *
     * @return RepositoryInterface
     */
    public function setQueryFactory(AbstractRepositoryQueryFactory $queryFactory);
    
    /**
     * @param $criteria
     *
     * @return StatementIterator
     */
    public function executeCriteria($criteria);
    
    /**
     * @param integer $offset
     *
     * @return RepositoryInterface
     */
    public function setOffset($offset);
    
    /**
     * @param integer $length
     *
     * @return RepositoryInterface
     */
    public function setLimit($length);
    
    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator();
    
    /**
     * @return Select
     */
    public function createFinder();
    
    /**
     * @return Insert
     */
    public function createPersister();
    
    /**
     * @return Delete
     */
    public function createRemover();
    
    /**
     * @return RemoverInterface
     */
    public function getRemover();
    
    /**
     * @return PersisterInterface
     */
    public function getPersister();
    
    /**
     * @return FinderInterface
     */
    public function getFinder();
    
    /**
     * @return Update
     * @deprecated
     */
    public function createUpdateQuery();
    
}
