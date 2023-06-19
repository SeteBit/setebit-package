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

            match ($action) {
                'created' => (new StorePrizedraw())->handle($prizedraw),
                'updated' => (new UpdatePrizedraw())->handle($prizedraw['external_prizedraw_id'], $prizedraw),
                'canceled' => (new CancelPrizedraw())->handle($prizedraw['external_prizedraw_id'])
            };

            $message->ack();
        });
    }
}