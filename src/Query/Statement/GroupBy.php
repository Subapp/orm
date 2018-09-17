<?php

namespace Subapp\Orm\Query\Statement;

use Subapp\Orm\Exception\BadArgumentException;
use Subapp\Orm\Logger\Collection\Collection;
use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Builder\Syntax;
use Subapp\Orm\Query\Expr\Column;
use Subapp\Orm\Query\Expression;

/**
 * Class GroupBy
 * @package Subapp\Orm\Query\Statement
 */
class GroupBy extends AbstractStatement
{
    
    use Syntax\GroupByTrait;
    
    /**
     * @var Collection|null
     */
    protected $expressions = null;
    
    /**
     * @var bool
     */
    protected $withRollup = false;
    
    /**
     * GroupStatement constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        parent::__construct($builder);
        
        $this->expressions = new Collection();
    }
    
    /**
     * @inheritdoc
     */
    public function __clone()
    {
        $this->expressions = clone $this->expressions;
    }
    
    /**
     * @return Collection
     */
    public function getExpressions()
    {
        return $this->expressions;
    }
    
    /**
     * @param array ...$columns
     *
     * @return $this
     */
    public function add(...$columns)
    {
        foreach ($columns as $column) {
            $this->addGroupBy($column);
        }
        
        return $this;
    }
    
    /**
     * @param $expression
     *
     * @return $this
     */
    public function addGroupBy($expression)
    {
        if (!($expression instanceof Expression)) {
            $expression = new Column($expression);
        }
        
        $this->expressions->set($expression->hashCode(), $expression);
        
        return $this;
    }
    
    /**
     * @param bool $use
     *
     * @return $this
     */
    public function withRollup($use = false)
    {
        $this->withRollup = $use;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        return $this->expressions->exists()
            ? trim(sprintf("%s %s", implode(', ', array_map(function (Expression $expression) {
                return $this->stringifyExpression($expression);
            }, $this->expressions->toArray())), ($this->withRollup ? 'WITH ROLLUP' : null))) : null;
    }
    
    /**
     * @return GroupBy
     * @throws BadArgumentException
     */
    public function getGroupByStatement()
    {
        return $this;
    }
    
}
