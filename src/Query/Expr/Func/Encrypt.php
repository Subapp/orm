<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Encrypt extends Func
{
    
    /**
     * Encrypt constructor.
     * MySQL Function ENCRYPT
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('ENCRYPT', $parameters);
    }
    
}