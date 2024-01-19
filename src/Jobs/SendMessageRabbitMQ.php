<?php

namespace Setebit\Package\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Setebit\Package\Facades\RabbitMQ;

class SendMessageRabbitMQ implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public int $tries = 10;

    public function __construct(
        private readonly string $message,
        private readonly string $target,
        private readonly string $exchange = '',
        private readonly string $typeExchange = 'fanout',
        private readonly bool $closeConnection = true
    ) {
    }

    public function handle(): void
    {
        RabbitMQ::sendMessage(
            message: $this->message,
            target: $this->target,
            exchange: $this->exchange,
            typeExchange: $this->typeExchange,
            closeConnection: $this->closeConnection
        );
    }

    public function backoff(): array
    {
        return [300, 600, 1800, 3600]; // 5 min, 10 min, 30 min, 1 hour
    }
}
