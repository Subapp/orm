<?php

namespace Subapp\Orm\ServiceContainer;

use Subapp\Orm\Common\Configuration;
use Subapp\Orm\Connection\ConnectionManagerInterface;
use Subapp\Orm\Core\ClassManager;
use Subapp\Orm\Core\EntityManager;
use Subapp\Orm\Core\EntityStateManager;
use Subapp\Orm\Core\MetadataManager;
use Subapp\Orm\Core\RepositoryManager;
use Subapp\Orm\Core\State\StateManagerInterface;
use Subapp\Orm\EventDispatcher\Dispatcher;
use Psr\Log\LoggerInterface;

/**
 * Interface ContainerInterface
 * @package Subapp\Orm\ServiceContainer
 */
interface ServiceLocatorInterface
{
    
    /**
     * @param string $name
     * @param object $service
     *
     * @return mixed
     */
    public function set($name, $service);
    
    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name);
    
    /**
     * @return Configuration
     */
    public function getConfiguration();
    
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return ServiceLocatorInterface
     */
    public function setLogger(LoggerInterface $logger);
    
    /**
     * @return LoggerInterface
     */
    public function getLogger();
    
    /**
     * @return Dispatcher
     */
    public function getDispatcher();
    
    /**
     * @return ClassManager
     */
    public function getClassManager();
    
    /**
     * @return MetadataManager
     */
    public function getMetadataManager();
    
    /**
     * @return RepositoryManager
     */
    public function getRepositoryManager();
    
    /**
     * @return StateManagerInterface|EntityStateManager
     */
    public function getEntityStateManager();
    
    /**
     * @return EntityManager
     */
    public function getEntityManager();
    
    /**
     * @return ConnectionManagerInterface
     */
    public function getConnectionManager();
    
    /**
     * @param null|string $name
     *
     * @return \Subapp\Orm\Connection\ConnectionInterface
     */
    public function getConnection($name = null);
    
    
}