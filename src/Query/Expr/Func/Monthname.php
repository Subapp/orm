<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Monthname extends Func
{
    
    /**
     * Monthname constructor.
     * MySQL Function MONTHNAME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('MONTHNAME', $parameters);
    }
    
}