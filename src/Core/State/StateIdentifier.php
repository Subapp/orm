<?php declare(strict_types=true);

namespace Subapp\Orm\Core\State;

use Subapp\Orm\Common\ObjectIdentity;

/**
 * Class StateIdentifier
 * @package Subapp\Orm\Core\State
 */
class StateIdentifier implements StateIdentifierInterface
{
    
    /**
     * @var ObjectIdentity
     */
    private $identifier;
    
    /**
     * StateIdentifier constructor.
     *
     * @param object $object
     */
    public function __construct(object $object)
    {
        $this->identifier = ObjectIdentity::createFromObject($object);
    }
    
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->identifier->getIdentifier();
    }
    
    /**
     * @return string
     */
    public function getObjectName(): string
    {
        return $this->identifier->getObjectName();
    }
    
}