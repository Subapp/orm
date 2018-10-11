<?php

namespace Subapp\Orm\Extension;

use Subapp\Collection\Parameters\ParametersCollection;

/**
 * Interface ExtensionInterface
 * @package Subapp\Orm\Extension
 */
interface ExtensionInterface
{
    
    /**
     * @param ParametersCollection $collection
     *
     * @return mixed
     */
    public function setConfiguration(ParametersCollection $collection);
    
    /**
     * @return ParametersCollection
     */
    public function getConfiguration();
    
    /**
     * @return string
     */
    public function getNameNS();
    
}