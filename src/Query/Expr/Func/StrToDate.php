<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class StrToDate extends Func
{
    
    /**
     * StrToDate constructor.
     * MySQL Function STR_TO_DATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('STR_TO_DATE', $parameters);
    }
    
}