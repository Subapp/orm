<?php

namespace Subapp\Orm\ServiceContainer;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Common\Configuration;
use Subapp\Orm\Connection\ConnectionManager;
use Subapp\Orm\Connection\ConnectionManagerInterface;
use Subapp\Orm\Core\ClassManager;
use Subapp\Orm\Core\EntityManager;
use Subapp\Orm\Core\EntityStateManager;
use Subapp\Orm\Core\MetadataManager;
use Subapp\Orm\Core\RepositoryManager;
use Subapp\Orm\Core\State\StateManagerInterface;
use Subapp\Orm\EventDispatcher\Dispatcher;
use Subapp\Orm\Logger\Log;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Container
 * @package Subapp\Orm\ServiceContainer
 */
final class ServiceLocator implements ServiceLocatorInterface, LoggerAwareInterface
{
    
    /**
     * @var Collection
     */
    protected $instances = null;
    
    /**
     * Container constructor.
     */
    private function __construct()
    {
        $this->instances = new Collection();
    }
    
    /**
     * @return ServiceLocatorInterface
     */
    public static function instance()
    {
        static $instance = null;
        
        if (null === $instance) {
            $instance = new ServiceLocator();
        }
        
        return $instance;
    }
    
    /**
     * @return ClassManager
     */
    public function getClassManager()
    {
        if (!$this->instances->has('classManager')) {
            $this->instances->set('classManager', new ClassManager());
        }
        
        return $this->get('classManager');
    }
    
    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->instances->get($name);
    }
    
    /**
     * @return MetadataManager
     */
    public function getMetadataManager()
    {
        if (!$this->instances->has('metadataManager')) {
            $configuration = $this->getConfiguration();
            $rootDirectory = dirname($configuration['identity']);
            $metadata = sprintf('%s/%s/%s', $rootDirectory, $configuration->getBuildPath(), $configuration->getMetadataFile());
            
            $this->instances->set('metadataManager', new MetadataManager($metadata, $this));
        }
        
        return $this->get('metadataManager');
    }
    
    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->instances->get('configuration');
    }
    
    /**
     * @return RepositoryManager
     */
    public function getRepositoryManager()
    {
        if (!$this->instances->has('repositoryManager')) {
            $this->instances->set('repositoryManager', new RepositoryManager($this));
        }
        
        return $this->get('repositoryManager');
    }
    
    /**
     * @return StateManagerInterface|EntityStateManager
     */
    public function getEntityStateManager()
    {
        if (!$this->instances->has('entityStateManager')) {
            $this->instances->set('entityStateManager', new EntityStateManager());
        }
        
        return $this->get('entityStateManager');
    }
    
    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        if (!$this->instances->has('entityManager')) {
            $this->instances->set('entityManager', new EntityManager($this));
        }
        
        return $this->get('entityManager');
    }
    
    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        if (!$this->instances->has('logger')) {
            $this->setLogger(new Log('logger'));
        }
        
        return null;
    }
    
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return ServiceLocatorInterface
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->set('logger', $logger);
        
        return $this;
    }
    
    /**
     * @param string $name
     * @param object $service
     *
     * @return void
     */
    public function set($name, $service)
    {
        $this->instances->set($name, $service);
    }
    
    /**
     * @return Dispatcher
     */
    public function getDispatcher()
    {
        if (!$this->instances->has('dispatcher')) {
            $this->instances->set('dispatcher', new Dispatcher());
        }
        
        return $this->get('dispatcher');
    }
    
    /**
     * @param null|string $connectionName
     *
     * @return \Subapp\Orm\Connection\ConnectionInterface
     */
    public function getConnection($connectionName = null)
    {
        /** @var Configuration $configuration */
        $configuration = $this->get('configuration');
        $connectionName = null !== $connectionName ?: $configuration->getConnectionName();
        
        return $this->getConnectionManager()->getConnection($connectionName);
    }
    
    /**
     * @return ConnectionManagerInterface
     */
    public function getConnectionManager()
    {
        /** @var Configuration $configuration */
        $configuration = $this->get('configuration');
        
        if (!$this->instances->has('connectionManager')) {
            $this->set('connectionManager', new ConnectionManager($configuration['connection']));
        }
        
        return $this->get('connectionManager');
    }
    
}