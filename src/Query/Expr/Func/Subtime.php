<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Subtime extends Func
{
    
    /**
     * Subtime constructor.
     * MySQL Function SUBTIME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SUBTIME', $parameters);
    }
    
}