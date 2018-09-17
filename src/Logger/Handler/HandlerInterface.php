<?php

namespace Subapp\Orm\Logger\Handler;

use Subapp\Orm\Logger\Collection\Collection;
use Subapp\Orm\Logger\Formatter\FormatterInterface;

/**
 * Interface HandlerInterface
 * @package Subapp\Orm\Logger\Handler
 */
interface HandlerInterface
{
    
    /**
     * @param Collection $record
     *
     * @return null
     */
    public function handle(Collection $record);
    
    /**
     * @param $level
     *
     * @return boolean
     */
    public function levelAllow($level);
    
    /**
     * @return FormatterInterface
     */
    public function getFormatter();
    
    /**
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter);
    
}