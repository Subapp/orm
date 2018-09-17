<?php declare(strict_types=true);

namespace Subapp\Orm\Core\State;

/**
 * Interface StateInterface
 * @package Subapp\Orm\Core\State
 */
interface StateInterface
{
    
    /**
     * @return StateIdentifierInterface
     */
    public function getIdentifier();
    
    /**
     * @return StateIdentifierInterface
     */
    public function getOwner();
    
}