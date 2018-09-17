<?php

namespace Subapp\Orm\Query\Expr\Func;

use Subapp\Orm\Exception\BadCallMethodException;
use Subapp\Orm\Query\Expr\Func;

class OldPassword extends Func
{
    
    /**
     * OldPassword constructor.
     * MySQL Function OLD_PASSWORD
     *
     * @param array $parameters
     *
     * @throws BadCallMethodException
     */
    public function __construct(...$parameters)
    {
        parent::__construct('OLD_PASSWORD', $parameters);
    }
    
}