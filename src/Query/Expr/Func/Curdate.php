<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Curdate extends Func
{
    
    /**
     * Curdate constructor.
     * MySQL Function CURDATE
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CURDATE', $parameters);
    }
    
}