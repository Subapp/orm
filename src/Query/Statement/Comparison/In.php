<?php

namespace Subapp\Orm\Query\Statement\Comparison;

use Subapp\Orm\Exception\BadArgumentException;

class In extends Comparison
{
    /**
     * @return string
     * @throws BadArgumentException
     */
    protected function buildCondition()
    {
        $right = $this->stringifyExpression($this->getRightExpression());
        $left = $this->stringifyExpression($this->getLeftExpression());
        
        return sprintf('%s %s(%s)', $left, $this->getComparator(), $right);
    }
    
}