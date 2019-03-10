<?php

namespace Subapp\Orm\Core\Event;

use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Sql\Query\Query;

/**
 * Class FinderExecutionEvent
 * @package Subapp\Orm\Core\Event
 */
class FinderExecutionEvent extends AbstractEvent
{
    
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    
    /**
     * @var Query
     */
    protected $query;
    
    /**
     * FinderExecutionEvent constructor.
     *
     * @param RepositoryInterface $repository
     * @param Query         $query
     */
    public function __construct(RepositoryInterface $repository, Query $query)
    {
        $this->repository = $repository;
        $this->query = $query;
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }
    
}