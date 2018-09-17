<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Nullif extends Func
{
    
    /**
     * Nullif constructor.
     * MySQL Function NULLIF
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('NULLIF', $parameters);
    }
    
}