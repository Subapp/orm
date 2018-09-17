<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class ConcatWs extends Func
{
    
    /**
     * ConcatWs constructor.
     * MySQL Function CONCAT_WS
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CONCAT_WS', $parameters);
    }
    
}