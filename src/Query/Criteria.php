<?php

namespace Subapp\Orm\Query;

use Subapp\Orm\Query\Builder\Common;
use Subapp\Orm\Query\Builder\Select;
use Subapp\Orm\Query\Builder\Syntax\GroupByTrait;
use Subapp\Orm\Query\Builder\Syntax\HavingTrait;
use Subapp\Orm\Query\Builder\Syntax\JoinTrait;
use Subapp\Orm\Query\Builder\Syntax\LimitTrait;
use Subapp\Orm\Query\Builder\Syntax\ModifiersTrait;
use Subapp\Orm\Query\Builder\Syntax\OrderByTrait;
use Subapp\Orm\Query\Builder\Syntax\WhereTrait;
use Subapp\Orm\ServiceContainer\ServiceLocator;

/**
 * Proxy Class For Select Query Builder
 *
 * Class Criteria
 * @package Subapp\Orm\Query
 */
class Criteria
{
    
    use Common\BaseBuilderTrait, Common\SelectTrait;
    use WhereTrait, GroupByTrait, OrderByTrait, ModifiersTrait, HavingTrait, JoinTrait, LimitTrait;
    
    /**
     * @var Builder\Select
     */
    protected $builder;
    
    /**
     * Criteria constructor.
     */
    public function __construct()
    {
        $this->builder = new Select(ServiceLocator::instance()->getConnection());
    }
    
    /**
     * @inheritDoc
     */
    public function getBuilderObject()
    {
        return $this->builder;
    }
    
    /**
     * @inheritDoc
     */
    public function getSelectBuilderObject()
    {
        return $this->builder;
    }
    
    /**
     * @inheritDoc
     */
    public function getGroupByStatement()
    {
        return $this->builder->getGroupByStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getHavingStatement()
    {
        return $this->builder->getHavingStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getJoinStatement()
    {
        return $this->builder->getJoinStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getLimitStatement()
    {
        return $this->builder->getLimitStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getModifiersStatement()
    {
        return $this->builder->getModifiersStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getOrderByStatement()
    {
        return $this->builder->getOrderByStatement();
    }
    
    /**
     * @inheritDoc
     */
    public function getWhereStatement()
    {
        return $this->builder->getWhereStatement();
    }
    
}