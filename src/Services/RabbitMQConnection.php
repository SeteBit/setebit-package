<?php

namespace Setebit\Package\Services;

use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPTimeoutException;
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
    }

    public function sendMessage(string $message, string $queue = null, bool $closeConnection = true): void
    {
        try {
            if (!$this->channel->is_open()) {
                $this->openChannel();
            }

            $queue = $queue ?? $this->queue;
            $this->declareQueue($queue);

            $message = new AMQPMessage($message);

            $this->channel->basic_publish(
                $message,
                '',
                $queue
            );

            if ($closeConnection) {
                $this->closeConnection();
            }
        } catch (\Throwable $e) {
            Log::critical('sendMessage :: Error sending message to RabbitMQ', [
                'payload' => $message,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    public function sendMessageToExchange(
        string $message,
        string $exchange,
        bool $closeConnection = true,
        string $routingKey = '',
        string $type = 'fanout'
    ): void {
        try {
            if (!$this->channel->is_open()) {
                $this->openChannel();
            }

            $this->channel->exchange_declare($exchange, $type, false, true, false);

            $message = new AMQPMessage($message);

            $this->channel->basic_publish(
                $message,
                $exchange,
                $routingKey
            );

            if ($closeConnection) {
                $this->closeConnection();
            }
        } catch (\Throwable $e) {
            Log::critical('sendMessageToExchange :: Error sending message to RabbitMQ', [
                'payload' => $message,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    public function consumeMessages(callable $callback, string $queue = null, int $timeout = 60): void
    {
        try {
            if (!$this->channel->is_open()) {
                $this->openChannel();
            }

            $queue = $queue ?? $this->queue;
            $this->declareQueue($queue);

            $this->channel->basic_consume(
                $queue,
                '',
                false,
                false,
                false,
                false,
                $callback
            );

            while ($this->channel->is_consuming()) {
                $this->channel->wait(null, false, $timeout);
            }
        } catch (AMQPTimeoutException) {
            $this->closeConnection();
        } catch (\Throwable $e) {
            Log::critical('consumeMessages :: Error consuming messages from RabbitMQ', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    private function declareQueue(string $queueName): void
    {
        if (!empty($queueName)) {
            $this->channel->queue_declare(
                $queueName,
                true,
                false,
                false,
                false
            );
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

    private function openChannel(): void
    {
        $this->channel = $this->connection->channel();
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
