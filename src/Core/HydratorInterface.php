<?php

namespace Subapp\Orm\Core;

/**
 * Interface HydratorInterface
 * @package Subapp\Orm\Core
 */
interface HydratorInterface
{
    
    /**
     * @param array  $data
     * @param object $object
     *
     * @return mixed
     */
    public function hydrate(array $data, $object);
    
    /**
     * @param object $object
     *
     * @return array
     */
    public function extract($object);
    
}