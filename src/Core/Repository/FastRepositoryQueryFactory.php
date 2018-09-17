<?php

namespace Subapp\Orm\Core\Repository;

use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Statement\Modifiers;

/**
 * Class FastRepositoryQueryFactory
 * @package Subapp\Orm\Core\Repository
 */
class FastRepositoryQueryFactory extends AbstractRepositoryQueryFactory
{
    
    /**
     * @return Builder\Insert
     * @throws \Subapp\Orm\Exception\NullPointerException
     */
    public function createInsertQuery()
    {
        return parent::createInsertQuery()->addModifier(Modifiers::DELAYED);
    }
    
}