<?php

namespace Subapp\Orm\Query\Statement\Comparison;

/**
 * Class IsNull
 * @package Subapp\Orm\Query\Statement\Comparison
 */
class IsNull extends Comparison
{
    
    /**
     * @return string
     */
    protected function buildCondition()
    {
        return sprintf('%s %s NULL', $this->stringifyExpression($this->getLeftExpression()), $this->getComparator());
    }
    
}