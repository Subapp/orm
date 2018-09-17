<?php

namespace Subapp\Orm\Filters;

/**
 * Interface FilterInterface
 * @package Subapp\Orm\Filters
 */
interface FilterInterface
{
    
    /**
     * @param string|integer|array $input
     *
     * @return string|integer|array
     */
    public function apply($input);
    
}