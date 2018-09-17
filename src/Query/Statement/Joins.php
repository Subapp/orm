<?php

namespace Subapp\Orm\Query\Statement;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Expression;
use Subapp\Orm\Query\Statement\Join\Join;

/**
 * Class Join
 * @package Subapp\Orm\Query\Statement
 */
class Joins extends AbstractStatement
{
    
    const INNER      = 'INNER';
    const RIGHT      = 'RIGHT';
    const LEFT       = 'LEFT';
    const FULL_OUTER = 'FULL OUTER';
    
    /**
     * @var Collection|Join[]
     */
    protected $joins = null;
    
    /**
     * Join constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        parent::__construct($builder);
        
        $this->joins = new Collection();
    }
    
    /**
     * @inheritdoc
     */
    public function __clone()
    {
        $joins = new Collection();
        
        foreach ($this->joins as $join) {
            $joins->add(clone $join);
        }
        
        $this->joins = $joins;
    }
    
    /**
     * @param Expression $foreign
     * @param Where      $on
     * @param string     $joinType
     *
     * @return $this
     */
    public function add(Expression $foreign, Where $on, $joinType = self::INNER)
    {
        $this->joins->add(new Join($this->getBuilder(), $foreign, $on, $joinType));
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        return $this->joins->exists() ? implode(PHP_EOL, array_map(function (Join $join) {
            return $join->toSQL();
        }, $this->joins->toArray())) : null;
    }
    
}
