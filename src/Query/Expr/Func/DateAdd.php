<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class DateAdd extends Func
{
    
    /**
     * DateAdd constructor.
     * MySQL Function DATE_ADD
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DATE_ADD', $parameters);
    }
    
}