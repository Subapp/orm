<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Coalesce extends Func
{
    
    /**
     * Coalesce constructor.
     * MySQL Function COALESCE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('COALESCE', $parameters);
    }
    
}