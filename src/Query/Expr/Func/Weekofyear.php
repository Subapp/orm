<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Weekofyear extends Func
{
    
    /**
     * Weekofyear constructor.
     * MySQL Function WEEKOFYEAR
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('WEEKOFYEAR', $parameters);
    }
    
}