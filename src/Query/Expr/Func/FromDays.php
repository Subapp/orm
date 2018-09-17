<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class FromDays extends Func
{
    
    /**
     * FromDays constructor.
     * MySQL Function FROM_DAYS
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('FROM_DAYS', $parameters);
    }
    
}