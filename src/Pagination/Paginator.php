<?php

namespace Subapp\Orm\Pagination;

use Subapp\Orm\Connection\StmtInterface;
use Subapp\Orm\Core\Domain\RepositoryInterface;
use Subapp\Orm\Core\ResultSet\ResultSet;
use Subapp\Sql\Query\Query;

/**
 * Class Paginator
 * @package Subapp\Orm\Pagination
 */
class Paginator implements \IteratorAggregate
{
    
    /**
     * @var int
     */
    protected $currentPage = 1;
    
    /**
     * @var int
     */
    protected $countPerPage = 10;
    
    /**
     * @var int
     */
    protected $totalPages = 1;
    
    /**
     * @var RepositoryInterface
     */
    protected $repository;
    
    /**
     * Paginator constructor.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * @return $this
     */
    public function processRepository()
    {
        $repository = $this->getRepository();
        
        $this->determineTotalPages();
        
        $current    = max(0, min($this->getTotalPages(), $this->getCurrentPage()) - 1);
        $length     = $this->getCountPerPage();
        $offset     = $current * $this->getCountPerPage();
        
        $repository->setLimit($length, $offset);
        
        return $this;
    }
    
    /**
     * @return RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }
    
    /**
     * @return $this
     */
    public function determineTotalPages()
    {
        $repository = $this->getRepository();
        $queryBuild = clone $repository->getQuery();
        $metadata = $repository->getEntityMetadata();
        $connection = $repository->getConnection();
        
        $identifier = $metadata->getIdentifier();
        $identifier = $metadata->getRawSQLName($identifier);
        
        $queryBuild->reset(Query::GROUP_BY | Query::SELECT);
        $queryBuild->select(sprintf('count(%s) rows', $identifier));
        
        /** @var StmtInterface|\PDOStatement $statement */
        $statement = $connection->query($queryBuild->getSql());
        
        $totalRows = $statement->fetchColumn(0);
        $this->totalPages = (integer) ceil($totalRows / $this->getCountPerPage());
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCountPerPage()
    {
        return $this->countPerPage;
    }
    
    /**
     * @param int $countPerPage
     *
     * @return $this
     */
    public function setCountPerPage($countPerPage)
    {
        $this->countPerPage = $countPerPage;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }
    
    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }
    
    /**
     * @param int $currentPage
     *
     * @return $this
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        
        return $this;
    }
    
    /**
     * @return ResultSet
     */
    public function getIterator()
    {
        return $this->getRepository()->findAll();
    }
    
}
