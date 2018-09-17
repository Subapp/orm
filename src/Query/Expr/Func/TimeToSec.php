<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class TimeToSec extends Func
{
    
    /**
     * TimeToSec constructor.
     * MySQL Function TIME_TO_SEC
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('TIME_TO_SEC', $parameters);
    }
    
}