<?php

namespace Subapp\Orm\Logger\Formatter;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Class LineFormatter
 * @package Subapp\Orm\Logger\Formatter
 */
class LineFormatter extends AbstractFormatter
{
    
    /**
     * LineFormatter constructor.
     *
     * @param null $format
     */
    public function __construct($format = null)
    {
        if (null !== $format) {
            $this->setFormat($format);
        }
    }
    
    /**
     * @param Collection $replacement
     *
     * @return string
     */
    public function format(Collection $replacement)
    {
        $replacement = $this->prepare($replacement);
        $messageLines = explode(PHP_EOL, $replacement['message']);
        
        foreach ($messageLines as &$messageLine) {
            $replacement['message'] = $messageLine;
            $messageLine = $this->replace($this->getFormat(), $replacement);
        }
        
        return implode(PHP_EOL, $messageLines);
    }
    
}
