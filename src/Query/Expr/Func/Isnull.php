<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Isnull extends Func
{
    
    /**
     * Isnull constructor.
     * MySQL Function ISNULL
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('ISNULL', $parameters);
    }
    
}