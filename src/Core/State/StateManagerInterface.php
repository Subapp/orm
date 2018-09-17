<?php declare(strict_types=true);

namespace Subapp\Orm\Core\State;

/**
 * Interface StateManagerInterface
 * @package Subapp\Orm\Core\State
 */
interface StateManagerInterface
{
    
    /**
     * @param StateIdentifierInterface $identifier
     *
     * @return mixed
     */
    public function getState(StateIdentifierInterface $identifier): StateInterface;
    
    /**
     * @param StateIdentifierInterface $identifier
     *
     * @return mixed
     */
    public function hasState(StateIdentifierInterface $identifier): boolean;
    
    /**
     * @param StateInterface $state
     *
     * @return mixed
     */
    public function setState(StateInterface $state): StateManagerInterface;
    
}