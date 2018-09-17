<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class SystemUser extends Func
{
    
    /**
     * SystemUser constructor.
     * MySQL Function SYSTEM_USER
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SYSTEM_USER', $parameters);
    }
    
}