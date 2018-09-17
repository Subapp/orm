<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class Substring extends Func
{
    
    /**
     * Substring constructor.
     * MySQL Function SUBSTRING
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('SUBSTRING', $parameters);
    }
    
}