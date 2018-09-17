<?php

namespace Subapp\Orm\Validator;

/**
 * Interface ValidableInterface
 * @package Subapp\Orm\Validator
 */
interface ValidableInterface
{
    
    /**
     * @param mixed $value
     *
     * @return ValidableInterface
     */
    public function with($value): ValidableInterface;
    
    /**
     * @return bool
     */
    public function validate(): boolean;
    
}