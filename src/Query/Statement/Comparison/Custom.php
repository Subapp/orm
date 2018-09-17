<?php

namespace Subapp\Orm\Query\Statement\Comparison;

use Subapp\Orm\Exception\BadCallMethodException;

/**
 * Class RawCondition
 * @package Subapp\Orm\Query\Comparison
 */
class Custom extends Comparison
{
    
    /**
     * @return string
     * @throws BadCallMethodException
     */
    protected function buildCondition()
    {
        return $this->stringifyExpression($this->getLeftExpression());
    }
    
}
