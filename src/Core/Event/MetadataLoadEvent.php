<?php

namespace Subapp\Orm\Core\Event;

use Subapp\Orm\Core\Domain\MetadataInterface;

/**
 * Class MetadataLoadEvent
 * @package Subapp\Orm\Core\Event
 */
class MetadataLoadEvent extends AbstractEvent
{
    
    /**
     * @var MetadataInterface
     */
    protected $metadata;
    
    /**
     * MetadataLoadEvent constructor.
     *
     * @param MetadataInterface $metadata
     */
    public function __construct(MetadataInterface $metadata)
    {
        $this->metadata = $metadata;
    }
    
    /**
     * @return MetadataInterface
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
    
}