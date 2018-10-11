<?php

namespace Subapp\Orm\Common;

use Subapp\Collection\Parameters\ParametersCollection;
use Subapp\Orm\Exception\NullPointerException;

/**
 * Class Configuration
 * @package Subapp\Orm\Common
 */
class Configuration extends ParametersCollection
{

    const ORM_KEY = 'orm';

    /**
     * @return bool
     */
    public function validateIdentity()
    {
        $isValid = isset($this['identity']) && file_exists($this['identity']);

        if (!$isValid) {
           $this->throwNullPointerException(['identity']);
        }

        return $isValid;
    }
    
    /**
     * @return mixed|null
     */
    public function getConnection()
    {
        $this->validateConnection();

        return $this['connection'];
    }
    
    /**
     * @return bool
     */
    public function validateConnection()
    {
        $isValid = isset($this['connection'], $this['connectionName']);

        if (!$isValid) {
            $this->throwNullPointerException(['connectionName', 'connection']);
        }

        return $isValid;
    }
    
    /**
     * @return mixed|null
     */
    public function getConnectionName()
    {
        $this->validateConnection();

        return $this['connectionName'];
    }
    
    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this['identity'];
    }

    /**
     * @return bool
     */
    public function validateSchemaFile()
    {
        $isValid = isset($this['schemaFile']);

        if (!$isValid) {
            $this->throwNullPointerException(['schemaFile']);
        }

        return $isValid;
    }

    /**
     * @return bool
     */
    public function getSchemaFile()
    {
        $this->validateSchemaFile();

        return $this['schemaFile'];
    }

    /**
     * @return bool
     */
    public function validateRuntimeDirectory()
    {
        $isValid = isset($this['runtimeDirectory']);

        if (!$isValid) {
            $this->throwNullPointerException(['runtimeDirectory']);
        } else {
            $build = $this['runtimeDirectory'];
            $isValid = isset($build['build'], $build['autoload'], $build['metadata']);

            if (!$isValid) {
                $this->throwNullPointerException(['build', 'autoload', 'metadata',]);
            }
        }

        return $isValid;
    }

    /**
     * @return array
     */
    public function getRuntimeDirectory()
    {
        $this->validateRuntimeDirectory();

        return $this['runtimeDirectory'];
    }

    /**
     * @return mixed
     */
    public function getBuildPath()
    {
        $this->validateRuntimeDirectory();

        return $this['runtimeDirectory']['build'];
    }

    /**
     * @return string
     */
    public function getMetadataFile()
    {
        $this->validateRuntimeDirectory();

        return $this['runtimeDirectory']['metadata'];
    }

    /**
     * @return string
     */
    public function getAutoloadFile()
    {
        $this->validateRuntimeDirectory();

        return $this['runtimeDirectory']['autoload'];
    }

    /**
     * @return string|null
     */
    public function getAdditionalConfigurationDirectory()
    {
        return isset($this['configurationGlobPattern']) ? $this['configurationGlobPattern'] : null;
    }

    /**
     * @param array $keys
     * @throws NullPointerException
     */
    private function throwNullPointerException(array $keys)
    {
        throw new NullPointerException(sprintf('Required keys (%s) for configuration object does not exists', implode(', ', $keys)));
    }
    
}