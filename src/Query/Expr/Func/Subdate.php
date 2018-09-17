<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Subdate extends Func
{
    
    /**
     * Subdate constructor.
     * MySQL Function SUBDATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SUBDATE', $parameters);
    }
    
}