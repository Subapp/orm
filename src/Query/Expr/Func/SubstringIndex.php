<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class SubstringIndex extends Func
{
    
    /**
     * SubstringIndex constructor.
     * MySQL Function SUBSTRING_INDEX
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SUBSTRING_INDEX', $parameters);
    }
    
}