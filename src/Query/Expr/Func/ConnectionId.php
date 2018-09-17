<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class ConnectionId extends Func
{
    
    /**
     * ConnectionId constructor.
     * MySQL Function CONNECTION_ID
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CONNECTION_ID', $parameters);
    }
    
}