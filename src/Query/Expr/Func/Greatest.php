<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Greatest extends Func
{
    
    /**
     * Greatest constructor.
     * MySQL Function GREATEST
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('GREATEST', $parameters);
    }
    
}