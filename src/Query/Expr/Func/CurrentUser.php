<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class CurrentUser extends Func
{
    
    /**
     * CurrentUser constructor.
     * MySQL Function CURRENT_USER
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CURRENT_USER', $parameters);
    }
    
}