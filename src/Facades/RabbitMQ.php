<?php

namespace Setebit\Package\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void sendMessage(string $message)
 * @method static void consumeMessages(callable $callback)
 */
class RabbitMQ extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Setebit\Package\Services\RabbitMQConnection::class;
    }
}