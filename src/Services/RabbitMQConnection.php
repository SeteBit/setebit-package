<?php

namespace Setebit\Package\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQConnection
{
    private AMQPChannel $channel;
    private AMQPStreamConnection $connection;
    private string $host;
    private int $port;
    private string $user;
    private string $pass;
    private string $queue;
    private string $vhost;

    public function __construct()
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

    public function sendMessage(string $content, string $queue = null): void
    {
        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            $message,
            '',
            $queue ?? $this->queue
        );

        $this->closeConnection();
    }

    public function sendMessageToExchange(string $content, string $exchange): void
    {
        $message = new AMQPMessage($content);

        $this->channel->basic_publish(
            $message,
            $exchange
        );

        $this->closeConnection();
    }

    public function consumeMessages(callable $callback, string $queue = null, int $timeout = 60): void
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

        try {
            while ($this->channel->is_consuming()) {
                $this->channel->wait(null, false, $timeout);
            }
        } catch (\PhpAmqpLib\Exception\AMQPTimeoutException) {
            $this->closeConnection();
        }
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

    private function closeConnection(): void
    {
        $this->channel->close();
        $this->connection->close();
    }

    public function __destruct()
    {
        $this->closeConnection();
    }
}
