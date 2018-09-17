<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class LastInsertId extends Func
{
    
    /**
     * LastInsertId constructor.
     * MySQL Function LAST_INSERT_ID
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('LAST_INSERT_ID', $parameters);
    }
    
}