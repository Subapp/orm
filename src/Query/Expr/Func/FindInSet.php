<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class FindInSet extends Func
{
    
    /**
     * FindInSet constructor.
     * MySQL Function FIND_IN_SET
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('FIND_IN_SET', $parameters);
    }
    
}