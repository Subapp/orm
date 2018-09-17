<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Extract extends Func
{
    
    /**
     * Extract constructor.
     * MySQL Function EXTRACT
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('EXTRACT', $parameters);
    }
    
}