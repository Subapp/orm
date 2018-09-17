<?php

namespace Subapp\Orm\Logger\Handler;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Class EchoHandler
 * @package Subapp\Orm\Logger\Handler
 */
class EchoHandler extends AbstractHandler
{
    
    /**
     * @param Collection $record
     *
     * @return null
     */
    public function handle(Collection $record)
    {
        echo $this->getFormatter()->format($record) . PHP_EOL;
        
        return true;
    }
    
}