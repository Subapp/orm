<?php

namespace Subapp\Orm\Connection;

use Subapp\Orm\Exception\BadArgumentException;

/**
 * Interface ConnectionManagerInterface
 * @package Subapp\Orm\Connection
 */
interface ConnectionManagerInterface
{
    
    /**
     * @param $name
     *
     * @return ConnectionInterface
     * @throws BadArgumentException
     */
    public function getConnection($name);
    
}