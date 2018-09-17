<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Adddate extends Func
{
    
    /**
     * Adddate constructor.
     * MySQL Function ADDDATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('ADDDATE', $parameters);
    }
    
}