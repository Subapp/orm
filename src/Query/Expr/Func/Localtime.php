<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Localtime extends Func
{
    
    /**
     * Localtime constructor.
     * MySQL Function LOCALTIME
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('LOCALTIME', $parameters);
    }
    
}