<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void sendMessage(string $message, string $queue = null)
 * @method static void consumeMessages(callable $callback, string $queue = null, bool $closeConnection = true)
 * @method static void sendMessageToExchange(string $message, string $exchange, bool $closeConnection = true)
 */
class RabbitMQ extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'rabbitmq';
    }
}
