<?php

namespace Subapp\Orm\Schema\Types;

use Subapp\Orm\Exception\BadArgumentException;

/**
 * Class EnumType
 * @package Subapp\Orm\Schema\Types
 */
class EnumType extends StringType
{
    
    /**
     * @inheritDoc
     */
    public function toPhpValue($value)
    {
        return parent::toPhpValue($value);
    }
    
    /**
     * @param $value
     *
     * @return string
     * @throws BadArgumentException
     */
    public function toPlatformValue($value)
    {
        if (!is_array($this->getExtra()) || !in_array($value, $this->getExtra())) {
            throw new BadArgumentException(sprintf('Enumeration type error. Allowed only (%s)', implode(', ', $this->getExtra())));
        }
        
        return parent::toPlatformValue($value);
    }
    
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return static::ENUM;
    }
    
}
