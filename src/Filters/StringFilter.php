<?php

namespace Subapp\Orm\Filters;

/**
 * Class StringFilter
 * @package Subapp\Orm\Filters
 */
class StringFilter extends AbstractFilter
{
    
    /**
     * @inheritdoc
     */
    public function apply($input)
    {
        return (string) $input;
    }
    
}