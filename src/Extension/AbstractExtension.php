<?php

namespace Subapp\Orm\Extension;

use Subapp\Orm\Common\Callback;
use Subapp\Orm\Core\Event\EntityLifecycleEvent;
use Subapp\Orm\EventDispatcher\EventSubscriber;
use Subapp\Orm\Exception\NotFoundException;
use Subapp\Orm\Parameters\ParametersCollection;

/**
 * Class AbstractExtension
 * @package Subapp\Orm\Extension
 */
abstract class AbstractExtension implements ExtensionInterface, EventSubscriber
{
    
    /**
     * @var ParametersCollection
     */
    protected $configuration;
    
    /**
     * AbstractExtension constructor.
     *
     * @param ParametersCollection $configuration
     *
     * @throws NotFoundException
     */
    public function __construct(ParametersCollection $configuration)
    {
        $extensionConfiguration = $configuration->path(sprintf('extensions.%s', $this->getNameNS()));
        
        if (null === $extensionConfiguration) {
            throw new NotFoundException(sprintf('Extension could not be loaded because configuration for "%s" does not exist',
                $this->getNameNS()));
        }
        
        $this->setConfiguration($extensionConfiguration);
    }
    
    /**
     * @param $variable
     *
     * @return bool
     */
    protected static function isIterable($variable)
    {
        if (version_compare(PHP_VERSION, 7.1) === -1) {
            return is_array($variable) || ($variable instanceof \Traversable);
        } else {
            return is_iterable($variable);
        }
    }
    
    /**
     * @param EntityLifecycleEvent $event
     * @param callable             $callback
     */
    protected function resolveEntities(EntityLifecycleEvent $event, callable $callback)
    {
        $callback = new Callback($callback);
        
        foreach ($this->getConfiguration() as $entityClassName => $extensionConfiguration) {
            if ($event->getEntity() instanceof $entityClassName) {
                $entity = $event->getEntity();
                $callback->call(...[$entity, $extensionConfiguration]);
            }
        }
    }
    
    /**
     * @inheritDoc
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
    
    /**
     * @inheritDoc
     */
    public function setConfiguration(ParametersCollection $collection)
    {
        $this->configuration = $collection;
        
        return $this;
    }
    
}