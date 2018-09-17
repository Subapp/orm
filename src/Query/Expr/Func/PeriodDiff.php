<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class PeriodDiff extends Func
{
    
    /**
     * PeriodDiff constructor.
     * MySQL Function PERIOD_DIFF
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('PERIOD_DIFF', $parameters);
    }
    
}