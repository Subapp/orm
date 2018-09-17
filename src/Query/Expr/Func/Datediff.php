<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Datediff extends Func
{
    
    /**
     * Datediff constructor.
     * MySQL Function DATEDIFF
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DATEDIFF', $parameters);
    }
    
}