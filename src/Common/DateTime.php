<?php

namespace Subapp\Orm\Common;

/**
 * Class DateTime
 *
 * @package Subapp\Orm\Common
 */
class DateTime extends \DateTime
{
    
    /**
     * @var string
     */
    protected $dateTimeFormat = parent::ATOM;
    
    /**
     * @param mixed $format
     *
     * @return $this
     */
    public function setFormat($format)
    {
        $this->dateTimeFormat = $format;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->format($this->getFormat());
    }
    
    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->dateTimeFormat;
    }
    
}