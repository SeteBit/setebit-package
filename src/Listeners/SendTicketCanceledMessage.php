<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCanceled;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketCanceledMessage
{
    public function handle(TicketCanceled $event): void
    {
        info('Listener SendTicketCanceledMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $original = $event->original;

        if ($ticket->situation === 'cancelado' && empty($original['canceled_at'])) {
            info(
                'Listener SendTicketCanceledMessage sending message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );

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

            RabbitMQ::sendMessageToExchange(message: json_encode($payload), exchange: 'tickets');

            info('Listener SendTicketCanceledMessage sent message to RabbitMQ.', ['ticket_id' => $event->ticket->id]);
        }

        info('Listener SendTicketCanceledMessage finished.', ['ticket_id' => $event->ticket->id]);
    }
}
