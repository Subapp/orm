<?php

namespace Subapp\Orm\Schema\Types;

/**
 * Class DoubleType
 *
 * @package Subapp\Orm\Schema\Types
 */
class DoubleType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return round(parent::toPhpValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return round(parent::toPlatformValue($value), $this->getPrecision());
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::DOUBLE;
    }
    
}