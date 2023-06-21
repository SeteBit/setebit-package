<?php

namespace Setebit\Package\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConnection
{
    private AMQPChannel $channel;
    private AMQPStreamConnection|null $connection = null;
    private string $host;
    private int $port;
    private string $user;
    private string $pass;
    private string $queue;
    private string $vhost;

    public function __destruct()
    {
        $this->closeConnection();
    }

    private function createConnection(): void
    {
        $this->getEnvValues();

        $this->connection = new AMQPStreamConnection(
            host: $this->host,
            port: $this->port,
            user: $this->user,
            password: $this->pass,
            vhost: $this->vhost,
        );

        $this->channel = $this->connection->channel();

        $this->channel->queue_declare(
            queue: $this->queue,
            durable: true,
            auto_delete: false,
        );
    }

    private function closeConnection(): void
    {
        if ($this->connection !== null) {
            $this->channel->close();
            $this->connection->close();
        }
    }

    public function sendMessage(string $content, string $queue = null): void
    {
        if ($this->connection === null) {
            $this->createConnection();
        }

        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            msg: $message,
            routing_key: $queue ?? $this->queue,
        );

        $this->closeConnection();
    }

    public function sendMessageToExchange(string $content, string $exchange): void
    {
        if ($this->connection === null) {
            $this->createConnection();
        }

        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            msg: $message,
            exchange: $exchange
        );

        $this->closeConnection();
    }

    public function consumeMessages(callable $callback, string $queue = null): void
    {
        if ($this->connection === null) {
            $this->createConnection();
        }

        $this->channel->basic_consume(
            queue: $queue ?? $this->queue,
            callback: $callback
        );

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }

        $this->closeConnection();
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
}
