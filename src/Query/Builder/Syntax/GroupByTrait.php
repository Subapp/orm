<?php

namespace Subapp\Orm\Query\Builder\Syntax;

use Subapp\Orm\Exception\BadArgumentException;
use Subapp\Orm\Query\Statement\GroupBy;

/**
 * Class GroupByTrait
 * @package Subapp\Orm\Query\Builder
 */
trait GroupByTrait
{
    
    /**
     * @return GroupBy
     * @throws BadArgumentException
     */
    abstract public function getGroupByStatement();
    
    /**
     * @param $column
     *
     * @return $this
     */
    public function addGroupBy($column)
    {
        return $this->groupBy([$column]);
    }
    
    /**
     * @param array $columns
     *
     * @return $this
     * @throws BadArgumentException
     */
    public function groupBy(...$columns)
    {
        $this->getGroupByStatement()->add(...$columns);
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function clearGroupByColumns()
    {
        $this->getGroupByStatement()->getExpressions()->clear();
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function withRollup()
    {
        $this->getGroupByStatement()->withRollup(true);
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function withoutRollup()
    {
        $this->getGroupByStatement()->withRollup(false);
        
        return $this;
    }
    
}
