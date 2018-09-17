<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Localtimestamp extends Func
{
    
    /**
     * Localtimestamp constructor.
     * MySQL Function LOCALTIMESTAMP
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('LOCALTIMESTAMP', $parameters);
    }
    
}