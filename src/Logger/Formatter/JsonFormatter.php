<?php

namespace Subapp\Orm\Logger\Formatter;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Class JsonFormatter
 * @package Subapp\Orm\Logger\Formatter
 */
class JsonFormatter extends AbstractFormatter
{
    
    /**
     * @var bool
     */
    protected $prettyPrint = false;
    
    /**
     * JsonFormatter constructor.
     *
     * @param bool $prettyPrint
     */
    public function __construct($prettyPrint = false)
    {
        $this->prettyPrint = $prettyPrint;
    }
    
    /**
     * @param Collection $record
     *
     * @return string
     */
    public function format(Collection $record)
    {
        return json_encode($this->prepare($record), ($this->prettyPrint ? JSON_PRETTY_PRINT : 0));
    }
    
}