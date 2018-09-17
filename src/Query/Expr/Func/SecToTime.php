<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class SecToTime extends Func
{
    
    /**
     * SecToTime constructor.
     * MySQL Function SEC_TO_TIME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SEC_TO_TIME', $parameters);
    }
    
}