<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Dayofyear extends Func
{
    
    /**
     * Dayofyear constructor.
     * MySQL Function DAYOFYEAR
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DAYOFYEAR', $parameters);
    }
    
}