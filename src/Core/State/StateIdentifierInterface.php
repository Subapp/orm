<?php declare(strict_types=true);

namespace Subapp\Orm\Core\State;

/**
 * Interface StateIdentifierInterface
 * @package Subapp\Orm\Core\State
 */
interface StateIdentifierInterface
{
    
    /**
     * @return string
     */
    public function getId(): string;
    
    /**
     * @return string
     */
    public function getObjectName(): string;
    
}