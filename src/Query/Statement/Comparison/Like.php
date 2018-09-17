<?php

namespace Subapp\Orm\Query\Statement\Comparison;

use Subapp\Orm\Exception\BadArgumentException;

/**
 * Class Like
 * @package Subapp\Orm\Query\Statement\Comparison
 */
class Like extends Comparison
{
    
    /**
     * @return string
     * @throws BadArgumentException
     */
    protected function buildCondition()
    {
        return sprintf('%s %s %s',
            $this->stringifyExpression($this->getLeftExpression()),
            $this->getComparator(),
            $this->stringifyExpression($this->getRightExpression())
        );
    }
    
}
