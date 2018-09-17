<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class TimeFormat extends Func
{
    
    /**
     * TimeFormat constructor.
     * MySQL Function TIME_FORMAT
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('TIME_FORMAT', $parameters);
    }
    
}