<?php

namespace Subapp\Orm\Core;

/**
 * Interface ActiveRecordInterface
 * @package Subapp\Orm\Core
 */
interface ActiveRecordInterface
{
    
    /**
     * @return integer
     */
    public function save();
    
    /**
     * @return integer
     */
    public function delete();
    
}