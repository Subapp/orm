<?php

namespace Subapp\Orm\Core\Storage;

use Subapp\Orm\Core\Domain\EntityInterface;

/**
 * Interface RemoverInterface
 * @package Subapp\Orm\Core\Storage
 */
interface RemoverInterface
{
    
    /**
     * @param EntityInterface $entity
     *
     * @return $this
     */
    public function remove(EntityInterface $entity);
    
}