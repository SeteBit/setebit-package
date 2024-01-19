<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;
use Setebit\Package\Services\RabbitMQConnection;

/**
 * @method static void sendMessage(string $message, string $target, string $exchange = '', string $typeExchange = 'fanout', bool $closeConnection = true)
 * @method static void consumeMessages(callable $callback, string $queue, bool $closeConnection = true)
 */
class RabbitMQ extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RabbitMQConnection::class;
    }
}
