<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class LastDay extends Func
{
    
    /**
     * LastDay constructor.
     * MySQL Function LAST_DAY
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('LAST_DAY', $parameters);
    }
    
}