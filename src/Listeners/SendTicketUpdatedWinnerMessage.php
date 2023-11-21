<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketUpdatedWinner;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketUpdatedWinnerMessage
{
    public function handle(TicketUpdatedWinner $event): void
    {
        info('Listener SendTicketUpdatedWinnerMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $original = $event->original;

        if ($ticket->situation === 'vencedor') {
            info(
                'Listener SendTicketUpdatedWinnerMessage sending message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );

            if ($original['situation'] === 'vencedor') {
                $value = $ticket->prize - $original['prize'];
            } else {
                $value = $ticket->prize;
            }

            if ($value === 0) {
                return;
            }

            $payload = [
                'action' => 'update_winner',
                'ticket' => [
                    'id' => $ticket->id,
                    'user_id' => $ticket->user_id,
                    'code' => $ticket->code,
                    'situation' => $ticket->situation,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'prize' => $value,
                    'prizedraws' => $ticket->relationLoaded('ticketPrizedraws')
                        ? $ticket->ticketPrizedraws
                        : null,
                    'created_at' => $ticket->created_at,
                ],
            ];

            RabbitMQ::sendMessageToExchange(json_encode($payload), 'tickets');

            info(
                'Listener SendTicketUpdatedWinnerMessage sent message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );
        }

        info('Listener SendTicketUpdatedWinnerMessage finished.', ['ticket_id' => $event->ticket->id]);
    }
}
