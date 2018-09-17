<?php

namespace Subapp\Orm\Core\Storage;

use Subapp\Orm\Core\Domain\EntityInterface;

/**
 * Interface PersisterInterface
 * @package Subapp\Orm\Core\Storage
 */
interface PersisterInterface
{
    
    /**
     * @param EntityInterface $entity
     *
     * @return $this
     */
    public function create(EntityInterface $entity);
    
    /**
     * @param EntityInterface $entity
     *
     * @return $this
     */
    public function update(EntityInterface $entity);
    
}