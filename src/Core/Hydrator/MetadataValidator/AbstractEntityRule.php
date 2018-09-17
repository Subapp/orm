<?php

namespace Subapp\Orm\Core\Hydrator\MetadataValidator;

use Subapp\Orm\Validator\MessageInterface;
use Subapp\Orm\Validator\Messages\WarningMessage;
use Subapp\Orm\Validator\Rules\AbstractRule;

/**
 * Class AbstractEntityRule
 * @package Subapp\Orm\Core\Hydrator\MetadataValidator
 */
abstract class AbstractEntityRule extends AbstractRule
{
    
    /**
     * @return bool
     */
    public function validate(): boolean
    {
        return false;
    }
    
    /**
     * @return MessageInterface
     */
    protected function setupDefaultMessage(): MessageInterface
    {
        return new WarningMessage(sprintf('Validator rule [%s] was failure when validation was executed', static::class));
    }
    
}