<?php

namespace Subapp\Orm\Schema\Platform;

use Subapp\Orm\Schema\Platform;

/**
 * Class MySQLPlatform
 * @package Subapp\Orm\Schema\Platform
 */
class MySQLPlatform extends Platform
{
    
    /**
     * MySQLPlatform constructor.
     */
    public function __construct()
    {
        parent::__construct('mysql');
    }
    
}