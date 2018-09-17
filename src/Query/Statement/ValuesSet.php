<?php

namespace Subapp\Orm\Query\Statement;

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Query\Builder;
use Subapp\Orm\Query\Expr;

/**
 * Class ValuesSet
 * @package Subapp\Orm\Query\Statement
 */
class ValuesSet extends AbstractStatement
{
    
    use Builder\Syntax\ValuesSetTrait;
    
    /**
     * @var Collection|Collection[]
     */
    protected $dataSet;
    
    /**
     * ValuesSet constructor.
     *
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        parent::__construct($builder);
        
        $this->dataSet = new Collection([
            'valuesSet'    => new Collection(),
            'columnHashes' => new Collection(),
        ]);
    }
    
    /**
     * @return string
     */
    public function toSQL()
    {
        $template = '(%s) VALUES %s';
        $values = $columns = [];
        
        foreach ($this->dataSet['valuesSet'] as $valuesSet) {
            $values[] = sprintf('(%s)', implode(', ', array_map(function ($valueItem) {
                return $this->stringifyExpression($valueItem);
            }, $valuesSet)));
        }
        
        foreach ($this->dataSet['columnHashes'] as $columnHash) {
            $columnExpression = $this->getBuilder()->getExpression($columnHash);
            $columns[] = $this->stringifyExpression($columnExpression);
        }
        
        return sprintf($template, implode(', ', $columns), implode(', ', $values));
    }
    
    /**
     * @param array $values
     *
     * @return $this
     */
    public function setInsertData(array $values)
    {
        $this->dataSet['valuesSet']->add(array_map(function ($value) {
            return $this->completeExpression(new Expr\Parameter($value));
        }, $values));
        
        if ($this->dataSet['columnHashes']->count() == 0) {
            $columns = array_map(function ($columnName) {
                $columnExpression = $this->completeExpression(new Expr\Column($columnName));
                
                return $columnExpression->hashCode();
            }, array_keys($values));
            
            $this->dataSet['columnHashes']->batch($columns);
        }
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function getValuesSetStatement()
    {
        return $this;
    }
    
}