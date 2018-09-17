<?php

namespace Subapp\Orm\Logger;

use Psr\Log\LogLevel as PsrLogLevel;

/**
 * Class LogLevel
 * @package Subapp\Orm\Logger
 */
class LogLevel extends PsrLogLevel
{
    const EVENT = 'event';
}