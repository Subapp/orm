<?php

namespace Subapp\Orm\Validator\Messages;

use Subapp\Orm\Validator\MessageInterface;

/**
 * Class ErrorMessage
 * @package Subapp\Orm\Validator\Messages
 */
class ErrorMessage extends AbstractMessage
{
    
    /**
     * ErrorMessage constructor.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message, MessageInterface::ERROR_CODE);
    }
    
    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('Error: %s', $this->toString());
    }
    
}