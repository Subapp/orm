<?php

namespace Subapp\Orm\Core\Repository;

/**
 * Class FastRepositoryQueryFactory
 * @package Subapp\Orm\Core\Repository
 */
class FastRepositoryQueryFactory extends AbstractRepositoryQueryFactory
{
    
    /**
     * @return \Subapp\Sql\Query\Query
     */
    public function createInsertQuery()
    {
        return parent::createInsertQuery()->delayed();
    }
    
}