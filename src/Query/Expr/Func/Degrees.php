<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Degrees extends Func
{
    
    /**
     * Degrees constructor.
     * MySQL Function DEGREES
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('DEGREES', $parameters);
    }
    
}