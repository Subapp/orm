<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Ifnull extends Func
{
    
    /**
     * Ifnull constructor.
     * MySQL Function IFNULL
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('IFNULL', $parameters);
    }
    
}