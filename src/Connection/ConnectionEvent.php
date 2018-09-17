<?php

namespace Subapp\Orm\Connection;

use Subapp\Orm\EventDispatcher\Event;

/**
 * Class ConnectionEvent
 * @package Subapp\Orm\Connection
 */
class ConnectionEvent extends Event
{
    
    const ON_QUERY = 'ormOnQuery';
    
    /**
     * @var ConnectionInterface
     */
    protected $connection;
    
    /**
     * @var null|string
     */
    protected $query;
    
    /**
     * ConnectionEvent constructor.
     *
     * @param ConnectionInterface $connection
     * @param null                $query
     */
    public function __construct(ConnectionInterface $connection, $query = null)
    {
        $this->connection = $connection;
        $this->query = $query;
    }
    
    /**
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }
    
    /**
     * @return null|string
     */
    public function getQuery()
    {
        return $this->query;
    }
    
}