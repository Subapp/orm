<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Sysdate extends Func
{
    
    /**
     * Sysdate constructor.
     * MySQL Function SYSDATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SYSDATE', $parameters);
    }
    
}