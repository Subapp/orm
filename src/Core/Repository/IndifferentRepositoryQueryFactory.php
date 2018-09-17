<?php

namespace Subapp\Orm\Core\Repository;

use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Statement\Modifiers;

/**
 * Class IndifferentRepositoryQueryFactory
 * @package Subapp\Orm\Core\Repository
 */
class IndifferentRepositoryQueryFactory extends AbstractRepositoryQueryFactory
{
    
    /**
     * @return Builder\Insert
     * @throws \Subapp\Orm\Exception\NullPointerException
     */
    public function createInsertQuery()
    {
        return parent::createInsertQuery()->addModifier(Modifiers::IGNORE);
    }
    
    /**
     * @return Builder\Update
     * @throws \Subapp\Orm\Exception\NullPointerException
     */
    public function createUpdateQuery()
    {
        return parent::createUpdateQuery()->addModifier(Modifiers::IGNORE);
    }
    
}