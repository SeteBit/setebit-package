<?php

namespace Setebit\Package\Services;

use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPTimeoutException;
use PhpAmqpLib\Message\AMQPMessage;
use Throwable;

class RabbitMQConnection
{
    private AMQPChannel $channel;
    private AMQPStreamConnection $connection;
    private string $host;
    private int $port;
    private string $user;
    private string $pass;
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

    /**
     * @throws Throwable
     */
    public function sendMessage(
        string $message,
        string $target,
        string $exchange = '',
        string $typeExchange = 'fanout',
        bool $closeConnection = true
    ): void {
        try {
            if (!$this->channel->is_open()) {
                $this->openChannel();
            }

            $message = new AMQPMessage($message);

            if (!empty($exchange)) {
                $this->channel->exchange_declare($exchange, $typeExchange, false, true, false);
                $this->channel->basic_publish($message, $exchange, $target);
            } else {
                $this->channel->queue_declare($target, true, false, false, false);
                $this->channel->basic_publish($message, '', $target);
            }

            if ($closeConnection) {
                $this->closeConnection();
            }
        } catch (Throwable $e) {
            Log::critical(self::class . ' :: Error sending message to RabbitMQ', [
                'payload' => $message,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw $e;
        }
    }

    public function consumeMessages(callable $callback, string $queue, int $timeout = 60): void
    {
        try {
            if (!$this->channel->is_open()) {
                $this->openChannel();
            }

            $this->channel->queue_declare($queue, true, false, false, false);

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
        } catch (Throwable $e) {
            Log::critical('consumeMessages :: Error consuming messages from RabbitMQ', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    private function getEnvValues(): void
    {
        $this->host = config('setebit-package.rabbitMQ.host');
        $this->port = config('setebit-package.rabbitMQ.port');
        $this->user = config('setebit-package.rabbitMQ.user');
        $this->pass = config('setebit-package.rabbitMQ.pass');
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
