<?php

namespace Subapp\Orm\Logger\Handler;

use Subapp\Orm\Logger\Formatter\FormatterInterface;
use Subapp\Orm\Logger\Formatter\LineFormatter;
use Subapp\Orm\Logger\Handler\Mask\LogLevelMask;

/**
 * Class AbstractHandler
 * @package Subapp\Orm\Logger\Handler
 */
abstract class AbstractHandler implements HandlerInterface
{
    
    /**
     * @var LogLevelMask
     */
    protected $level = null;
    
    /**
     * @var FormatterInterface
     */
    protected $formatter = null;
    
    /**
     * AbstractHandler constructor.
     *
     * @param $level
     */
    public function __construct($level)
    {
        $this->formatter = new LineFormatter();
        $this->level = new LogLevelMask($level);
    }
    
    /**
     * @return FormatterInterface
     */
    public function getFormatter()
    {
        return $this->formatter;
    }
    
    /**
     * @param FormatterInterface $formatter
     */
    public function setFormatter(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }
    
    /**
     * @param $level
     *
     * @return boolean
     */
    public function levelAllow($level)
    {
        return $this->level->has($level);
    }
    
    
}