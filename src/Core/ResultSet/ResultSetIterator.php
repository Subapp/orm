<?php

namespace Subapp\Orm\Core\ResultSet;

use Subapp\Orm\Core\Domain\RepositoryInterface;

/**
 * Class ResultSetIterator
 * @package Subapp\Orm\Core\ResultSet
 */
class ResultSetIterator extends ResultSet
{
    
    /**
     * ResultSetIterator constructor.
     *
     * @param RepositoryInterface $repository
     * @param \Iterator           $iterator
     */
    public function __construct(RepositoryInterface $repository, \Iterator $iterator)
    {
        parent::__construct($iterator);
        
        $this->entityRepository = $repository;
        $this->hydrator = $repository->getHydrator();
        $this->reflection = $repository->getEntityClassReflection();
    }
    
}