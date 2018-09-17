<?php

namespace Subapp\Orm\Query\Statement\Comparison;

use Subapp\Orm\Exception\BadArgumentException;

/**
 * Class LogicalCondition
 * @package Subapp\Orm\Query\Comparison
 */
class Logical extends Comparison
{
    
    /**
     * @return string
     * @throws BadArgumentException
     */
    protected function buildCondition()
    {
        $left = $this->stringifyExpression($this->getLeftExpression());
        $right = $this->stringifyExpression($this->getRightExpression());
        
        return sprintf('%s %s %s', $left, $this->getComparator(), $right);
    }
    
}