<?php

namespace Subapp\Orm\Schema\Types;

/**
 * Class StringType
 *
 * @package Subapp\Orm\Schema\Types
 */
class StringType extends AbstractScalarType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (string) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function toPlatformValue($value)
    {
        return (string) parent::toPlatformValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::STRING;
    }
    
}