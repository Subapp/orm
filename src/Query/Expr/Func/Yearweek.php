<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Yearweek extends Func
{
    
    /**
     * Yearweek constructor.
     * MySQL Function YEARWEEK
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('YEARWEEK', $parameters);
    }
    
}