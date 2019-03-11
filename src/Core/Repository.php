<?php

/************************************************
 * This file is part of Subapp\OrmLabs package     *
 * @copyright (c) 2016-2018 Ivan Hontarenko     *
 * @email ihontarenko@gmail.com                 *
 ************************************************/

namespace Subapp\Orm\Core;

use Subapp\Orm\Common\Callback;
use Subapp\Orm\Common\Inflector;
use Subapp\Orm\Connection\ConnectionInterface;
use Subapp\Orm\Connection\Statement\StatementIterator;
use Subapp\Orm\Core\Domain\EntityInterface;
use Subapp\Orm\Core\Domain\MetadataInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\Core\Event\FinderExecutionEvent;
use Subapp\Orm\Core\Hydrator\AbstractHydratorEntity;
use Subapp\Orm\Core\Hydrator\EntityHydrator;
use Subapp\Orm\Core\Repository\AbstractRepositoryQueryFactory;
use Subapp\Orm\Core\Repository\BasicRepositoryQueryFactory;
use Subapp\Orm\Core\ResultSet\ResultSet;
use Subapp\Orm\Core\ResultSet\ResultSetIterator;
use Subapp\Orm\EventDispatcher\DispatcherInterface;
use Subapp\Orm\EventDispatcher\EventInterface;
use Subapp\Orm\Exception\BadArgumentException;
use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Exception\NotFoundException;
use Subapp\Orm\Exception\NotSupportedException;
use Subapp\Orm\ServiceContainer\ServiceLocator;
use Subapp\Orm\ServiceContainer\ServiceLocatorInterface;
use Subapp\Sql\Query\Query;
use Subapp\Sql\Sql;

/**
 * Class EntityRepository
 * @package Subapp\Orm\Core
 */
abstract class Repository implements RepositoryInterface
{
    
    /**
     * @const string
     */
    const MAGIC_CALL_REGEXP = '/^(findBy|findOneBy|filterBy|orderBy|groupBy)([a-z0-9]+)$/ui';
    
    /**
     * @const integer
     */
    const RESULT_ITERABLE = 1;
    
    /**
     * @const integer
     */
    const RESULT_COLLECTION = 2;
    
    /**
     * @var string
     */
    protected $entityName;
    
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;
    
    /**
     * @var ConnectionInterface
     */
    protected $connection;
    
    /**
     * @var Query
     */
    protected $query;
    
    /**
     * @var AbstractHydratorEntity
     */
    protected $hydrator;
    
    /**
     * @var DispatcherInterface
     */
    protected $eventDispatcher;
    
    /**
     * @var AbstractRepositoryQueryFactory
     */
    protected $queryFactory;
    
    /**
     * EntityRepository constructor.
     *
     * @param string $entityName
     */
    public function __construct($entityName)
    {
        $this->serviceLocator = ServiceLocator::instance();
        
        $this->eventDispatcher = $this->serviceLocator->getDispatcher();
        $this->entityName = $entityName;
        $this->connection = $this->getServiceLocator()->getConnection($this->getEntityMetadata()->getConnectionName());
        
        $this->setHydrator(new EntityHydrator($this));
        $this->setQueryFactory(new BasicRepositoryQueryFactory());
        
        $this->resetSelectQuery();
    }
    
    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
    
    /**
     * @return MetadataInterface
     */
    public function getEntityMetadata()
    {
        return $this->getServiceLocator()->getMetadataManager()->getMetadataFor($this->getEntityName());
    }
    
    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }
    
    /**
     * @return Query
     */
    public function createFinder()
    {
        return $this->getQueryFactory()->createSelectQuery();
    }
    
    /**
     * @return AbstractRepositoryQueryFactory
     */
    public function getQueryFactory()
    {
        return $this->queryFactory;
    }
    
    /**
     * @param AbstractRepositoryQueryFactory $queryFactory
     *
     * @return $this
     */
    public function setQueryFactory(AbstractRepositoryQueryFactory $queryFactory)
    {
        $queryFactory->setRepository($this);
        
        $this->queryFactory = $queryFactory;
        
        return $this;
    }
    
    /**
     * @param       $name
     * @param array $arguments
     *
     * @return mixed
     * @throws BadCallMethodException
     */
    public function __call($name, array $arguments = [])
    {
        preg_match(static::MAGIC_CALL_REGEXP, $name, $matches);
        
        if (isset($matches[0])) {
            $metadata = $this->getEntityMetadata();
            
            array_shift($matches);
            
            list($methodName, $columnName) = $matches;
            
            $columnName = $metadata->getRawSQLName(Inflector::underscore($columnName));
            array_unshift($arguments, $columnName);
            
            $callback = new Callback([$this, $methodName]);
            
            return $callback->call($arguments);
        }
        
        throw new BadCallMethodException(sprintf('Trying to call %s::%s(); method. Allowed to call methods which starts with "%s"',
            static::class, $name, 'findBy, findOneBy, filterBy, orderBy or groupBy'));
    }
    
    /**
     * @param $class
     *
     * @return RepositoryInterface
     */
    public function getRepositoryFor($class)
    {
        return $this->getServiceLocator()->getRepositoryManager()->getRepositoryFor($class);
    }
    
    /**
     * @param array $criteria
     *
     * @return ResultSet
     */
    public function find(array $criteria)
    {
        return $this->findBy($criteria);
    }
    
    /**
     * @param mixed $criteria
     *
     * @return ResultSet
     */
    public function findBy($criteria)
    {
        return new ResultSetIterator($this, $this->executeCriteria($criteria));
    }
    
    /**
     * @param null $criteria
     *
     * @return StatementIterator
     */
    public function executeCriteria($criteria = null)
    {
        return $this->applyCriteria($criteria)->executeQueryStmt();
    }
    
    /**
     * @return StatementIterator
     */
    public function executeQueryStmt()
    {
        $query = $this->getQuery();
        
        $this->dispatchEvent(ORMEvents::beforeFindExecute, new FinderExecutionEvent($this, $query));

        $statement = $this->getConnection()->prepare($this->getQuery()->getSql(), []);
        
        // executes a prepared statement
        $statement->execute();
        
        $this->dispatchEvent(ORMEvents::afterFindExecute, new FinderExecutionEvent($this, $query));
        
        // reset qb to previous state
        $this->resetSelectQuery();
        
        return new StatementIterator($statement);
    }
    
    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }
    
    /**
     * @param Query $filterQuery
     *
     * @return $this
     */
    public function setQuery(Query $filterQuery)
    {
        $this->query = $filterQuery;
        
        return $this;
    }
    
    /**
     * @param                $eventName
     * @param EventInterface $event
     *
     * @return $this
     */
    public function dispatchEvent($eventName, EventInterface $event = null)
    {
        $this->getEventDispatcher()->dispatch($eventName, $event);
        
        return $this;
    }
    
    /**
     * @return DispatcherInterface
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }
    
    /**
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }
    
    /**
     * @return $this
     */
    public function resetSelectQuery()
    {
        $metadata = $this->getEntityMetadata();
        $query = $this->getQueryFactory()->createSelectQuery();

        $query->columns($metadata->getSelectColumns());
        $query->table($metadata->getTableName());
        
        $this->setQuery($query);
        
        return $this;
    }
    
    /**
     * @param $criteria
     *
     * @return $this
     * @throws NotSupportedException
     */
    protected function applyCriteria($criteria)
    {
        $query = $this->getQuery();
        $metadata = $this->getEntityMetadata();
        
        if (null !== $criteria) {
            switch (true) {
                case (is_scalar($criteria)):
                case (is_array($criteria) and count($criteria) > 0):
                    
                    if (is_array($criteria)) {
                        list($identifier, $criteria) = $criteria;
                    } else {
                        $identifier = $metadata->getRawSQLName($metadata->getIdentifier());
                    }
                    
                    $builder    = $query->builder();
                    $where      = $builder->eq($identifier, $criteria);
                    
                    $query->where($where);
                    
                    break;
                
                case $criteria instanceof Query:
                    $criteria->table($metadata->getTableName());
                    $this->setQuery($criteria);
                    break;

                default:
                    throw new NotSupportedException('It is impossible to determine the correct assignment criteria');
                    break;
            }
        }
        
        return $this;
    }
    
    /**
     * @return ResultSet
     */
    public function findAll()
    {
        return $this->findBy(null);
    }
    
    /**
     * @param $criteria
     *
     * @return $this
     */
    public function filterBy($criteria)
    {
        $this->applyCriteria($criteria);
        
        return $this;
    }
    
    /**
     * @param string $criteria
     *
     * @return $this
     */
    public function groupBy($criteria)
    {
        $this->getQuery()->group(...$criteria);
        
        return $this;
    }
    
    /**
     * @param $criteria
     *
     * @return $this
     */
    public function orderBy($criteria)
    {
        $this->getQuery()->order(...$criteria);
        
        return $this;
    }
    
    /**
     * @param int $id
     *
     * @return EntityInterface
     */
    public function retrieve($id)
    {
        return $this->findOneBy((integer) $id);
    }
    
    /**
     * @param $criteria
     *
     * @return EntityInterface
     * @throws BadArgumentException
     */
    public function findOneBy($criteria)
    {
        if (in_array($criteria, [null, false], true)) {
            throw new BadArgumentException(sprintf('Method "%s" could not been invoked with empty criteria', __METHOD__));
        }
        
        return $this->findFirst($criteria);
    }
    
    /**
     * @param $criteria
     *
     * @return EntityInterface
     */
    public function findFirst($criteria = null)
    {
        $this->getQuery()->limit(1);
        
        $resultSet = $this->findBy($criteria);
        $resultSet->rewind();
        
        return $resultSet->valid() ? $resultSet->current() : null;
    }
    
    /**
     * @param EntityInterface $entity
     *
     * @return $this
     * @throws NotSupportedException
     */
    public function persist(EntityInterface $entity)
    {
        $reflection = $this->getEntityClassReflection();
        
        if ($reflection->isInstance($entity)) {
            
            $this->dispatchEvent(ORMEvents::beforePersist, new EntityLifecycleEvent($this, $entity));
            
            $connection     = $this->getConnection();
            $metadata       = $this->getEntityMetadata();
            $isEntityNew    = $this->isNewEntity($entity);
            $entityData     = $this->getEntityDataArray($entity);
            $query          = $this->getPersisterForEntity($entity);
            $builder        = $query->builder();
            
            $query->sets($entityData);
            
            $propertyIdentifier = $metadata->getName($metadata->getIdentifier(), Metadata::CAMILIZED);
            
            if (!$isEntityNew && $reflection->hasProperty($propertyIdentifier)) {
                $where = $builder->eq($metadata->getIdentifier(), $entity->getByProperty($propertyIdentifier));
                $query->where($where);
            }
            
            $connection->start();
            $connection->execute($query->getSql());
            
            if ($reflection->hasProperty($propertyIdentifier) && $isEntityNew) {
                $reflection->getProperty($propertyIdentifier)->setValue($entity, $connection->lastInsertId());
            }
            
            $this->dispatchEvent(ORMEvents::afterPersist, new EntityLifecycleEvent($this, $entity));
            
            // commit changes after event dispatching
            $connection->commit();
            
            return $this;
        }
        
        throw new NotSupportedException(sprintf('Unable to persist entity! Actual entity "%s" expected entity "%s"',
            get_class($entity), $this->getEntityName()));
    }
    
    /**
     * @return \ReflectionClass|\ReflectionObject
     */
    public function getEntityClassReflection()
    {
        return $this->getClassManager()->getReflection($this->getEntityName());
    }
    
    /**
     * @return ClassManager
     */
    public function getClassManager()
    {
        return $this->getServiceLocator()->getClassManager();
    }
    
    /**
     * @param EntityInterface $entity
     *
     * @return bool
     */
    public function isNewEntity(EntityInterface $entity)
    {
        $reflection = $this->getEntityClassReflection();
        $metadata = $this->getEntityMetadata();
        $identifier = $metadata->getName($metadata->getIdentifier(), Metadata::CAMILIZED);
        
        return null !== $identifier
            ? ($reflection->getProperty($identifier)->getValue($entity) === null) : true;
    }
    
    /**
     * @param EntityInterface $entity
     *
     * @return array
     */
    protected function getEntityDataArray(EntityInterface $entity)
    {
        $metadata = $this->getEntityMetadata();
        $array = [];
        
        foreach ($this->getHydrator()->extract($entity) as $sqlName => $value) {
            if ($sqlName !== $metadata->getIdentifier() && null !== $value) {
                $array[$metadata->getRawSQLName($metadata->getName($sqlName))] = $this->connection->quoteIdentifier($value);
            }
        }
        
        return $array;
    }
    
    /**
     * @return AbstractHydratorEntity
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }
    
    /**
     * @param AbstractHydratorEntity $hydrator
     *
     * @return $this
     */
    public function setHydrator(AbstractHydratorEntity $hydrator)
    {
        $this->hydrator = $hydrator;
        
        return $this;
    }
    
    public function getPersisterForEntity(EntityInterface $entity)
    {
        return $this->isNewEntity($entity) ? $this->createPersister() : $this->createUpdateQuery();
    }
    
    /**
     * @inheritdoc
     */
    public function createPersister()
    {
        return $this->getQueryFactory()->createInsertQuery();
    }
    
    /**
     * @inheritdoc
     */
    public function createUpdateQuery()
    {
        return $this->getQueryFactory()->createUpdateQuery();
    }
    
    /**
     * @param EntityInterface $entity
     *
     * @return $this
     * @throws NotSupportedException
     */
    public function remove(EntityInterface $entity)
    {
        $reflection = $this->getEntityClassReflection();
        
        if ($reflection->isInstance($entity)) {
            
            // trigger event for entity and dispatcher on before remove
            $this->dispatchEvent(ORMEvents::beforeRemove, new EntityLifecycleEvent($this, $entity));
            
            // needed variables
            $metadata           = $this->getEntityMetadata();
            $query              = $this->createRemover();
            $builder            = $query->builder();
            $identifier         = $this->getEntityIdentifier();
            $connection         = $this->getConnection();
            $propertyIdentifier = $metadata->getName($identifier, Metadata::CAMILIZED);
            $where              = $builder->eq($identifier, $entity->getByProperty($propertyIdentifier));
            
            // refinement of the request
            $query->where($where)->limit(1);
            
            // open transaction and try to execute sql
            $connection->transaction(function () use ($connection, $query) {
                $connection->execute($query->getSql());
            });
            
            // reset identifier for removed entity
            $entity->setByProperty($propertyIdentifier, null);
            
            // trigger event for entity and dispatcher on after remove and all actions
            $this->dispatchEvent(ORMEvents::afterRemove, new EntityLifecycleEvent($this, $entity));
            
            return $this;
        }
        
        throw new NotSupportedException(sprintf('Unable to remove entity! Actual entity "%s" expected entity "%s"',
            get_class($entity), $this->getEntityName()));
    }
    
    /**
     * @return Query
     */
    public function createRemover()
    {
        return $this->getQueryFactory()->createDeleteQuery();
    }
    
    /**
     * @return string
     * @throws NotFoundException
     */
    public function getEntityIdentifier()
    {
        $identifier = $this->getEntityMetadata()->getIdentifier();
        
        if (null === $identifier) {
            throw new NotFoundException(sprintf('Cannot determine identifier name for "%s" entity',
                $this->getEntityName()));
        }
        
        return $identifier;
    }
    
    /**
     * @inheritDoc
     * @throws NotSupportedException
     */
    public function getRemover()
    {
        throw new NotSupportedException(sprintf('Method %s not implemented yet', __METHOD__));
    }
    
    /**
     * @inheritDoc
     * @throws NotSupportedException
     */
    public function getPersister()
    {
        throw new NotSupportedException(sprintf('Method %s not implemented yet', __METHOD__));
    }
    
    /**
     * @inheritDoc
     * @throws NotSupportedException
     */
    public function getFinder()
    {
        throw new NotSupportedException(sprintf('Method %s not implemented yet', __METHOD__));
    }
    
    /**
     * @param int $length
     *
     * @param int $offset
     * @return $this
     */
    public function setLimit($length, $offset = 0)
    {
        $this->getQuery()->limit($length, $offset);
        
        return $this;
    }
    
    /**
     * @param EntityInterface $entity
     * @param array           $entityData
     *
     * @return $this
     */
    public function hydrate(EntityInterface $entity, array $entityData)
    {
        $this->getHydrator()->hydrate($entityData, $entity);
        
        return $this;
    }
    
    /**
     * @param EntityInterface $entity
     *
     * @return array
     */
    public function extract(EntityInterface $entity)
    {
        return $this->getHydrator()->extract($entity);
    }
    
    /**
     * @param null $query
     *
     * @return mixed
     */
    public function executeQuery($query = null)
    {
        $connection = $this->getConnection();
        
        $connection->transaction(function (ConnectionInterface $connection) use ($query) {
            $connection->execute($query);
        });
        
        return $connection->affectedRows();
    }
    
}
