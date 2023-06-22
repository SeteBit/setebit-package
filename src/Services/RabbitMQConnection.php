<?php

namespace Setebit\Package\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConnection
{
    private static ?self $instance = null;
    private AMQPChannel $channel;
    private AMQPStreamConnection $connection;
    private string $host;
    private int $port;
    private string $user;
    private string $pass;
    private string $queue;
    private string $vhost;

    private function __construct()
    {
        $this->getEnvValues();

        $this->connection = new AMQPStreamConnection(
            $this->host,
            $this->port,
            $this->user,
            $this->pass,
            $this->vhost
        );

        $this->channel = $this->connection->channel();

        $this->channel->queue_declare(
            $this->queue,
            true,
            false,
            false,
            false
        );
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function sendMessage(string $content, string $queue = null): void
    {
        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            $message,
            '',
            $queue ?? $this->queue
        );
    }

    public function sendMessageToExchange(string $content, string $exchange): void
    {
        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            $message,
            $exchange
        );
    }

    public function consumeMessages(callable $callback, string $queue = null): void
    {
        $this->channel->basic_consume(
            $queue ?? $this->queue,
            '',
            false,
            false,
            false,
            false,
            $callback
        );

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }

    private function getEnvValues(): void
    {
        $this->host = config('setebit-package.rabbitMQ.host');
        $this->port = config('setebit-package.rabbitMQ.port');
        $this->user = config('setebit-package.rabbitMQ.user');
        $this->pass = config('setebit-package.rabbitMQ.pass');
        $this->queue = config('setebit-package.rabbitMQ.queue');
        $this->vhost = config('setebit-package.rabbitMQ.vhost');
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }
}
