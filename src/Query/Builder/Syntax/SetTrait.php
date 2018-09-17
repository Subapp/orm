<?php

namespace Subapp\Orm\Query\Builder\Syntax;

use Subapp\Orm\Query\Statement;

/**
 * Class SetTrait
 * @package Subapp\Orm\Query\Builder\Syntax
 */
trait SetTrait
{
    
    /**
     * @param $column
     * @param $value
     *
     * @return $this
     */
    public function setData($column, $value)
    {
        $this->getSetStatement()->set($column, $value);
        
        return $this;
    }
    
    /**
     * @param array $data
     *
     * @return $this
     */
    public function setDataBatch(array $data = [])
    {
        $this->getSetStatement()->batch($data);
        
        return $this;
    }
    
    /**
     * @return Statement\Set
     */
    abstract public function getSetStatement();
    
}