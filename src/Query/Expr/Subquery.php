<?php

namespace Subapp\Orm\Query\Expr;

use Subapp\Orm\Query\Builder\Select;
use Subapp\Orm\Query\Expression;

/**
 * Class Subquery
 * @package Subapp\Orm\Query\Expr
 */
class Subquery extends Expression
{
    
    /**
     * @var Select|null
     */
    protected $subquery = null;
    
    /**
     * Subquery constructor.
     *
     * @param Select $select
     */
    public function __construct(Select $select)
    {
        $this->subquery = $select;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toSQL();
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        return sprintf('(%s)', $this->subquery->toSQL());
    }
    
}
