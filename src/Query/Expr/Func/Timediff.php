<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Timediff extends Func
{
    
    /**
     * Timediff constructor.
     * MySQL Function TIMEDIFF
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('TIMEDIFF', $parameters);
    }
    
}