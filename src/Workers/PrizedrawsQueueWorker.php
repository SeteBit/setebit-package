<?php

namespace Setebit\Package\Workers;

use Setebit\Package\Actions\Prizedraw\StorePrizedraw;
use Setebit\Package\Actions\Prizedraw\UpdatePrizedraw;
use Setebit\Package\Actions\Prizedraw\CancelPrizedraw;
use Setebit\Package\Facades\RabbitMQ;
use PhpAmqpLib\Message\AMQPMessage;

readonly class PrizedrawsQueueWorker
{
    public function __construct(
        private StorePrizedraw $storePrizedraw,
        private UpdatePrizedraw $updatePrizedraw,
        private CancelPrizedraw $cancelPrizedraw,
    ) {
    }

    public function run(): void
    {
        RabbitMQ::consumeMessages(function (AMQPMessage $message) {
            $bodyParsed = json_decode($message->body, true);

            $action = $bodyParsed['action'];
            $prizedraw = $bodyParsed['prizedraw'];
            $externalId = $prizedraw['external_prizedraw_id'];

            match ($action) {
                'created' => $this->storePrizedraw->handle($prizedraw),
                'updated' => $this->updatePrizedraw->handle($externalId, $prizedraw),
                'canceled' => $this->cancelPrizedraw->handle($externalId),
                default => $message->ack(),
            };

            $message->ack();
        });
    }
}
