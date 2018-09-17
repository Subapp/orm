<?php

namespace Subapp\Orm\Schema\Types;

/**
 * Class JsonType
 *
 * @package Subapp\Orm\Schema\Types
 */
class JsonType extends StringType
{
    
    /**
     * @inheritdoc
     */
    public function toPhpValue($value)
    {
        return json_decode($value);
    }
    
    /**
     * @inheritdoc
     */
    public function toPlatformValue($value)
    {
        return parent::toPlatformValue(json_encode($value));
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::JSON;
    }
    
}
