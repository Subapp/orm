<?php

namespace Subapp\Orm\Schema\Types;

/**
 * Class BooleanType
 * @package Subapp\Orm\Schema\Types
 */
class BooleanType extends IntegerType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return (boolean) parent::toPhpValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::BOOLEAN;
    }
    
}