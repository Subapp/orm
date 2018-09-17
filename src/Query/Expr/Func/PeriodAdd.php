<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class PeriodAdd extends Func
{
    
    /**
     * PeriodAdd constructor.
     * MySQL Function PERIOD_ADD
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('PERIOD_ADD', $parameters);
    }
    
}