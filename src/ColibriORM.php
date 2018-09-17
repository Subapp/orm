<?php

namespace Subapp\Orm;

use Subapp\Orm\Common\Configuration;
use Subapp\Orm\Exception\InvalidArgumentException;
use Subapp\Orm\Exception\NotFoundException;
use Composer\Autoload\ClassLoader;

/**
 * Class Subapp\Orm
 * @package Subapp\Orm
 */
final class Subapp\OrmORM
{
    
    const VERSION_MAJOR  = 1;
    const VERSION_MINOR  = 13;
    const VERSION_PATCH  = 0;
    const VERSION_STATUS = 'stable';
    const VERSION_NAME   = 'Subapp\Orm';
    
    /**
     * @return string
     */
    public static function versionName()
    {
        return sprintf('v%s-%s [%s]', static::version(), static::VERSION_STATUS, static::VERSION_NAME);
    }
    
    /**
     * @return string
     */
    public static function version()
    {
        return sprintf('%d.%d.%d', static::VERSION_MAJOR, static::VERSION_MINOR, static::VERSION_PATCH);
    }
    
    /**
     * @param $version
     *
     * @return mixed
     */
    public static function versionCompare($version)
    {
        return version_compare(static::version(), $version);
    }
    
    /**
     * @param Configuration $configuration
     *
     * @throws InvalidArgumentException
     * @throws NotFoundException
     * @throws \InvalidArgumentException
     */
    public static function initialize(Configuration $configuration)
    {
        $configuration = static::normalizeConfiguration($configuration);
        
        if (!$configuration->validateIdentity()) {
            throw new InvalidArgumentException('Bad configuration identity');
        }
        
        if (!$configuration->validateConnection()) {
            throw new InvalidArgumentException('Bad connection settings. Check your configuration file ":file"', [
                'file' => $configuration->getIdentity(),
            ]);
        }
        
        static::loadAdditionalConfiguration($configuration);
        
        static::getServiceContainer()->set('configuration', $configuration);
        static::getServiceContainer()->set('classLoader', self::initializeClassLoader());
        
        static::getServiceContainer()->getDispatcher()
            ->addListener(null, [static::getServiceContainer()->getLogger(), 'event']);
    }
    
    /**
     * @param Configuration $configuration
     *
     * @return Configuration
     */
    protected static function normalizeConfiguration(Configuration $configuration)
    {
        return $configuration->get('Subapp\Orm_orm');
    }
    
    /**
     * @param Configuration $configuration
     *
     * @throws \InvalidArgumentException
     */
    protected static function loadAdditionalConfiguration(Configuration $configuration)
    {
        if (null !== ($pattern = $configuration->getAdditionalConfigurationDirectory())) {
            $iterator = new \DirectoryIterator(sprintf($pattern, dirname($configuration->getIdentity())));
            foreach ($iterator as $file) {
                $configuration->merge(Configuration::createFromFile($file->getRealPath()));
            }
        }
    }
    
    /**
     * @return ServiceContainer\ServiceLocatorInterface
     */
    public static function getServiceContainer()
    {
        return ServiceContainer\ServiceLocator::instance();
    }
    
    /**
     * @return ClassLoader
     * @throws NotFoundException
     */
    protected static function initializeClassLoader()
    {
        $configuration = static::getServiceContainer()->getConfiguration();
        
        $classLoaderFile = $configuration->path('build.autoload_file');
        $classLoaderDirectory = $configuration->path('build.build_path');
        $generatedClassesDirectory = dirname($configuration->get('identity'));
        
        $classLoader = sprintf('%s/%s/%s', $generatedClassesDirectory, $classLoaderDirectory, $classLoaderFile);
        
        if (false === ($classLoader = realpath($classLoader))) {
            throw new NotFoundException('Class loader file was not found. Maybe your application not installed yet');
        }
        
        return include_once $classLoader;
    }
    
}