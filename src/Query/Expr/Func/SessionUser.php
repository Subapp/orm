<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class SessionUser extends Func
{
    
    /**
     * SessionUser constructor.
     * MySQL Function SESSION_USER
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SESSION_USER', $parameters);
    }
    
}