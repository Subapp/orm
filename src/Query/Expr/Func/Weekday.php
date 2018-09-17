<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Weekday extends Func
{
    
    /**
     * Weekday constructor.
     * MySQL Function WEEKDAY
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('WEEKDAY', $parameters);
    }
    
}