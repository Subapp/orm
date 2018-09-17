<?php

namespace Subapp\Orm\Validator\Messages;

use Subapp\Orm\Validator\MessageInterface;

/**
 * Class NoticeMessage
 * @package Subapp\Orm\Validator\Messages
 */
class NoticeMessage extends AbstractMessage
{
    
    /**
     * NoticeMessage constructor.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message, MessageInterface::NOTICE_CODE);
    }
    
    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf('Notice: %s', $this->toString());
    }
    
}