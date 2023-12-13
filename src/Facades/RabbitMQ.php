<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;
use Setebit\Package\Services\RabbitMQConnection;

/**
 * @method static void sendMessage(string $message, string $queue = null)
 * @method static void consumeMessages(callable $callback, string $queue = null, bool $closeConnection = true)
 * @method static void sendMessageToExchange(string $message, string $exchange, bool $closeConnection = true, string $routingKey = '', string $type = 'fanout')
 */
class RabbitMQ extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RabbitMQConnection::class;
    }
}
