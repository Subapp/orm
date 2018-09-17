<?php

namespace Subapp\Orm\Query\Expr;

use Subapp\Orm\Query\Expression;

/**
 * Class Raw
 * @package Subapp\Orm\Query\Expr
 */
class Raw extends Expression
{
    
    /**
     * @var null
     */
    protected $query = null;
    
    /**
     * Raw constructor.
     *
     * @param $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->toSQL();
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        return $this->query;
    }
    
}