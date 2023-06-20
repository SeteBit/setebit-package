<?php

namespace Setebit\Package\Workers;

use Setebit\Package\Actions\Prizedraw\StorePrizedraw;
use Setebit\Package\Actions\Prizedraw\UpdatePrizedraw;
use Setebit\Package\Actions\Prizedraw\CancelPrizedraw;
use Setebit\Package\Facades\RabbitMQ;
use PhpAmqpLib\Message\AMQPMessage;

class PrizedrawsQueueWorker
{
    public function run(): void
    {
        RabbitMQ::consumeMessages(function (AMQPMessage $message) {
            $bodyParsed = json_decode($message->body, true);

            $action = $bodyParsed['action'];
            $prizedraw = $bodyParsed['prizedraw'];
            $externalId = $prizedraw['external_prizedraw_id'];

            match ($action) {
                'created' => (new StorePrizedraw())->handle($prizedraw),
                'updated' => (new UpdatePrizedraw())->handle($externalId, $prizedraw),
                'canceled' => (new CancelPrizedraw())->handle($externalId)
            };

            $message->ack();
        });
    }
}