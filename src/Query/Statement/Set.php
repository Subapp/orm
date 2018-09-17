<?php

namespace Subapp\Orm\Query\Statement;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Expr;

/**
 * Class Set
 * @package Subapp\Orm\Query\Statement
 */
class Set extends AbstractStatement
{
    
    use Builder\Syntax\SetTrait;
    
    /**
     * @var Collection
     */
    protected $set;
    
    /**
     * Set constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        parent::__construct($builder);
        
        $this->set = new Collection();
    }
    
    /**
     * @param array $data
     *
     * @return $this
     */
    public function batch(array $data = [])
    {
        foreach ($data as $column => $value) {
            $this->set($column, $value);
        }
        
        return $this;
    }
    
    /**
     * @param $column
     * @param $value
     *
     * @return $this
     */
    public function set($column, $value)
    {
        $column = $this->completeExpression(new Expr\Column($column));
        $value = $this->completeExpression(new Expr\Parameter($value));
        
        $this->set->set($column->hashCode(), $value);
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function getSetStatement()
    {
        return $this;
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        $set = [];
        
        foreach ($this->set as $columnHash => $value) {
            $column = $this->getBuilder()->getExpression($columnHash);
            $set[] = sprintf('%s = %s', $this->stringifyExpression($column), $this->stringifyExpression($value));
        }
        
        return implode(', ', $set);
    }
    
}