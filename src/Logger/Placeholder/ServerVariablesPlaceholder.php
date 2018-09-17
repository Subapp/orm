<?php

namespace Subapp\Orm\Logger\Placeholder;

use Subapp\Orm\Logger\Collection\Collection;

/**
 * Class ServerVariablesPlaceholder
 * @package Subapp\Orm\Logger\Placeholder
 */
class ServerVariablesPlaceholder extends AbstractPlaceholder
{
    
    /**
     * @var array
     */
    private $serverVariables = [
        'ip'         => 'REMOTE_ADDR',
        'port'       => 'REMOTE_PORT',
        'host'       => 'HTTP_HOST',
        'httpMethod' => 'REQUEST_METHOD',
        'uri'        => 'REQUEST_URI',
        'userAgent'  => 'HTTP_USER_AGENT',
    ];
    
    /**
     * @param Collection $record
     */
    public function complement(Collection $record)
    {
        foreach ($this->serverVariables as $name => $serverKey) {
            $record->set($name, $_SERVER[$serverKey] ?? 'NULL');
        }
    }
    
}