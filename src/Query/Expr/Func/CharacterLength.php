<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class CharacterLength extends Func
{
    
    /**
     * CharacterLength constructor.
     * MySQL Function CHARACTER_LENGTH
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('CHARACTER_LENGTH', $parameters);
    }
    
}