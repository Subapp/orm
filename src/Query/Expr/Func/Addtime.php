<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Addtime extends Func
{
    
    /**
     * Addtime constructor.
     * MySQL Function ADDTIME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('ADDTIME', $parameters);
    }
    
}