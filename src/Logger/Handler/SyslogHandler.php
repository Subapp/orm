<?php

namespace Subapp\Orm\Logger\Handler;

use Subapp\Orm\Logger\Collection\Collection;
use Subapp\Orm\Logger\Handler\Mask\LogLevelMask;

/**
 * Class SyslogHandler
 * @package Subapp\Orm\Logger\Handler
 */
class SyslogHandler extends AbstractHandler
{
    
    /**
     * SyslogHandler constructor.
     *
     * @param     $ident
     * @param int $options
     * @param int $facility
     * @param int $level
     */
    public function __construct($ident, $options = LOG_ODELAY, $facility = LOG_USER, $level = LogLevelMask::MASK_ALL)
    {
        parent::__construct($level);
        
        openlog($ident, $options, $facility);
    }
    
    /**
     * @param Collection $record
     *
     * @return void
     */
    public function handle(Collection $record)
    {
        error_log($this->formatter->format($record));
    }
    
}
