<?php

namespace Subapp\Orm\Core;

/**
 * Interface ProxyInterface
 * @package Subapp\Orm\Core
 */
interface ProxyInterface
{
    
    /**
     * @return mixed
     */
    public function initialize();
    
    /**
     * @return boolean
     */
    public function isInitialized();
    
}