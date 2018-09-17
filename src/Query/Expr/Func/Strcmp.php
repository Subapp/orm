<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Strcmp extends Func
{
    
    /**
     * Strcmp constructor.
     * MySQL Function STRCMP
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('STRCMP', $parameters);
    }
    
}