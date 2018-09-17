<?php

namespace Subapp\Orm\Query\Builder;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Connection\ConnectionInterface;
use Subapp\Orm\Exception\BadArgumentException;
use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Expr;
use Subapp\Orm\Query\Statement\Limit;
use Subapp\Orm\Query\Statement\Modifiers;
use Subapp\Orm\Query\Statement\OrderBy;
use Subapp\Orm\Query\Statement\Where;

/**
 * Class Delete
 * @package Subapp\Orm\Query\Builder
 */
class Delete extends Builder
{
    
    use Syntax\WhereTrait;
    use Syntax\OrderByTrait;
    use Syntax\LimitTrait;
    use Syntax\ModifiersTrait;
    
    const TEMPLATE = "DELETE%s%s%s%s%s";
    
    /**
     * @var Collection
     */
    protected $statements;
    
    /**
     * Builder constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);
        
        $this->statements = new Collection([
            'modifiers' => new Modifiers($this, Modifiers::MAP_DELETE),
            'where'     => new Where($this),
            'order'     => new OrderBy($this),
            'limit'     => new Limit($this),
        ]);
        
        $this->getLimitStatement()->setLimitOnly(true);
    }
    
    /**
     * @return Limit
     */
    public function getLimitStatement()
    {
        return $this->statements->offsetGet('limit');
    }
    
    /**
     * @param $table
     *
     * @return $this
     */
    public function setFromTable($table)
    {
        return $this->table($table);
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        $statements = [];
        $statementsNames = [
            'where' => "\nWHERE %s",
            'order' => "\nORDER BY %s",
            'limit' => "\nLIMIT %s",
        ];
        
        /** @var Expr\Table $table */
        $table = $this->normalizeExpression($this->table);
        
        $statements[] = (null === ($modifiers = $this->getModifiersStatement()->toSQL())) ? null : $modifiers;
        $statements[] = "\nFROM $table";
        
        foreach ($statementsNames as $name => $template) {
            if (null !== ($statement = $this->statements->get($name)) && null !== ($statementSQL = $statement->toSQL())) {
                $statements[] = sprintf($template, $statementSQL);
            } else {
                $statements[] = null;
            }
        }
        
        return sprintf(static::TEMPLATE, ...$statements);
    }
    
    /**
     * @return Modifiers
     */
    public function getModifiersStatement()
    {
        return $this->statements->offsetGet('modifiers');
    }
    
    /**
     * @return Where
     * @throws BadArgumentException
     */
    public function getWhereStatement()
    {
        return $this->statements->offsetGet('where');
    }
    
    /**
     * @return OrderBy
     * @throws BadArgumentException
     */
    public function getOrderByStatement()
    {
        return $this->statements->offsetGet('order');
    }
    
}