<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Dayofmonth extends Func
{
    
    /**
     * Dayofmonth constructor.
     * MySQL Function DAYOFMONTH
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DAYOFMONTH', $parameters);
    }
    
}