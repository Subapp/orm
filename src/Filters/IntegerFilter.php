<?php

namespace Subapp\Orm\Filters;

/**
 * Class IntegerFilter
 * @package Subapp\Orm\Filters
 */
class IntegerFilter extends AbstractFilter
{
    
    /**
     * @inheritdoc
     */
    public function apply($input)
    {
        return (integer) $input;
    }
    
}