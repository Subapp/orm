<?php

namespace Subapp\Orm\Logger\Placeholder;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Interface PlaceholderInterface
 * @package Subapp\Orm\Logger\Placeholder
 */
interface PlaceholderInterface
{
    
    /**
     * @param Collection $record
     *
     * @return void
     */
    public function complement(Collection $record);
    
}