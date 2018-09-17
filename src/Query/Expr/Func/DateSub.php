<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class DateSub extends Func
{
    
    /**
     * DateSub constructor.
     * MySQL Function DATE_SUB
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DATE_SUB', $parameters);
    }
    
}