<?php

namespace Subapp\Orm\Logger\Placeholder;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Class SystemIdsPlaceholder
 * @package Subapp\Orm\Logger\Placeholder
 */
class SystemIdsPlaceholder extends AbstractPlaceholder
{
    
    /**
     * @param Collection $record
     */
    public function complement(Collection $record)
    {
        $record->batch([
            'pid' => getmypid(),
            'uid' => getmyuid(),
            'gid' => getmygid(),
        ]);
    }
    
}