<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Maketime extends Func
{
    
    /**
     * Maketime constructor.
     * MySQL Function MAKETIME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('MAKETIME', $parameters);
    }
    
}