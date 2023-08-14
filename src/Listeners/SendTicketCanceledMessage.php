<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCanceled;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketCanceledMessage
{
    public function handle(TicketCanceled $event): void
    {
        $ticket = $event->ticket;
        $original = $ticket->getOriginal();

        if ($ticket->situation === 'cancelado' && empty($original['canceled_at'])) {
            $payload = [
                'action' => 'canceled',
                'ticket' => [
                    'id' => $ticket->id,
                    'user_id' => $ticket->user_id,
                    'code' => $ticket->code,
                    'situation' => $ticket->situation,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'commission' => $ticket->commission,
                    'prize' => $ticket->prize,
                    'created_at' => $ticket->created_at,
                ],
            ];

            RabbitMQ::sendMessageToExchange(json_encode($payload), 'tickets');
        }
    }
}
