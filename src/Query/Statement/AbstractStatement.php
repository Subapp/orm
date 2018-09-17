<?php

namespace Subapp\Orm\Query\Statement;

use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Expression;
use Subapp\Orm\Query\SqlableInterface;

/**
 * Class AbstractStatement
 * @package Subapp\Orm\Query\Statement
 */
abstract class AbstractStatement implements SqlableInterface
{
    
    /**
     * @var Builder
     */
    protected $builder = null;
    
    /**
     * AbstractStatement constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }
    
    /**
     * @return array
     */
    public function __debugInfo()
    {
        return ['class' => __CLASS__,];
    }
    
    /**
     * @param $identifier
     *
     * @return string
     */
    public function clearIdentifier($identifier)
    {
        return $this->getBuilder()->getConnection()->clearIdentifier($identifier);
    }
    
    /**
     * @return Builder
     */
    public function getBuilder()
    {
        return $this->builder;
    }
    
    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
        
        return $this;
    }
    
    /**
     * @param $identifier
     *
     * @return string
     */
    public function quoteIdentifier($identifier)
    {
        return $this->getBuilder()->quoteIdentifier($identifier);
    }
    
    /**
     * @param Expression $expression
     *
     * @return Expression
     */
    public function normalizeExpression(Expression $expression)
    {
        return $this->getBuilder()->normalizeExpression($expression);
    }
    
    /**
     * @param Expression $expression
     *
     * @return string
     */
    public function stringifyExpression(Expression $expression)
    {
        return $this->getBuilder()->stringifyExpression($expression);
    }
    
    
    /**
     * @param Expression $expression
     * @param null       $alias
     *
     * @return Expression
     */
    public function completeExpression(Expression $expression, $alias = null)
    {
        return $this->getBuilder()->completeExpression($expression, $alias);
    }
    
}