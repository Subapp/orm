<?php

namespace Subapp\Orm\Query;

/**
 * Interface SqlableInterface
 * @package Subapp\Orm\Query
 */
interface SqlableInterface
{
    
    /**
     * @return string
     */
    public function toSQL();
    
}