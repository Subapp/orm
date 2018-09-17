<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class CharLength extends Func
{
    
    /**
     * CharLength constructor.
     * MySQL Function CHAR_LENGTH
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CHAR_LENGTH', $parameters);
    }
    
}