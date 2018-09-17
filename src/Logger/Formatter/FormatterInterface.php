<?php

namespace Subapp\Orm\Logger\Formatter;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Interface FormatterInterface
 * @package Subapp\Orm\Logger\Formatter
 */
interface FormatterInterface
{
    
    const PLACEHOLDER_MASK_DOUBLE_DOT = ':%s';
    
    const PLACEHOLDER_MASK_BRACKETS = '{%s}';
    
    /**
     * @param Collection $record
     *
     * @return mixed
     */
    public function format(Collection $record);
    
}