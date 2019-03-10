<?php

namespace Subapp\Orm\Core\Repository;

/**
 * Class IndifferentRepositoryQueryFactory
 * @package Subapp\Orm\Core\Repository
 */
class IndifferentRepositoryQueryFactory extends AbstractRepositoryQueryFactory
{
    
    /**
     * @return \Subapp\Sql\Query\Query
     */
    public function createInsertQuery()
    {
        return parent::createInsertQuery()->ignore();
    }
    
    /**
     * @return \Subapp\Sql\Query\Query
     */
    public function createUpdateQuery()
    {
        return parent::createUpdateQuery()->ignore();
    }
    
}