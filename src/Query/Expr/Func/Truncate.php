<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Truncate extends Func
{
    
    /**
     * Truncate constructor.
     * MySQL Function TRUNCATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('TRUNCATE', $parameters);
    }
    
}