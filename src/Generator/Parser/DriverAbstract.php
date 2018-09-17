<?php

namespace Subapp\Orm\Generator\Parser;

use Subapp\Orm\Common\ArrayableInterface;
use Subapp\Orm\Schema\Database;

/**
 * Class DriverAbstract
 * @package Subapp\Orm\Generator\Parser
 */
abstract class DriverAbstract implements ArrayableInterface
{
    
    /**
     * @var Database
     */
    protected $schema;
    
    /**
     * DriverAbstract constructor.
     */
    public function __construct()
    {
        $this->schema = new Database('');
    }
    
    public function getSchema()
    {
        return $this->schema;
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
//    return $this->schema;
    }
    
}