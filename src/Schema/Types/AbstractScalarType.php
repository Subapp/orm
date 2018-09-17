<?php

namespace Subapp\Orm\Schema\Types;

use Subapp\Orm\Exception\NotSupportedException;

/**
 * Class AbstractScalarType
 * @package Subapp\Orm\Schema\Types
 */
abstract class AbstractScalarType extends Type
{
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPhpValue($value)
    {
        static::validateScalarValue($value);
        
        return $value;
    }
    
    /**
     * @param $value
     *
     * @throws NotSupportedException
     */
    private static function validateScalarValue($value)
    {
        if (!is_scalar($value)) {
            throw new NotSupportedException('Type handler :name expect only scalar value types', ['name' => static::class]);
        }
    }
    
    /**
     * @param $value
     *
     * @return mixed
     */
    public function toPlatformValue($value)
    {
        static::validateScalarValue($value);
        
        return $value;
    }
    
}