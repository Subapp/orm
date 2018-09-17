<?php

namespace Subapp\Orm\Core\Event;

use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Orm\Query\Builder\Select as SelectQuery;

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
     * @var SelectQuery
     */
    protected $selectQuery;
    
    /**
     * FinderExecutionEvent constructor.
     *
     * @param RepositoryInterface $repository
     * @param SelectQuery         $selectQuery
     */
    public function __construct(RepositoryInterface $repository, SelectQuery $selectQuery)
    {
        $this->repository = $repository;
        $this->selectQuery = $selectQuery;
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return SelectQuery
     */
    public function getSelectQuery()
    {
        return $this->selectQuery;
    }
    
}