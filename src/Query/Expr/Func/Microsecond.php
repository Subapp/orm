<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Microsecond extends Func
{
    
    /**
     * Microsecond constructor.
     * MySQL Function MICROSECOND
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('MICROSECOND', $parameters);
    }
    
}