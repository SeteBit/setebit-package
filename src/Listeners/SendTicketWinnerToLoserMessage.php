<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketResultAdded;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketWinnerToLoserMessage
{
    public function handle(TicketResultAdded $event): void
    {
        info('Listener SendTicketWinnerToLoserMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $original = $event->original;

        if ($original['situation'] === 'vencedor' && $ticket->situation === 'perdedor') {
            info(
                'Listener SendTicketWinnerToLoserMessage sending message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );

            $payload = [
                'action' => 'winner_to_loser',
                'ticket' => [
                    'id' => $ticket->id,
                    'user_id' => $ticket->user_id,
                    'code' => $ticket->code,
                    'situation' => $ticket->situation,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'prize' => $original['prize'],
                    'used_bonus' => $ticket->used_bonus ?? false,
                    'prizedraws' => $ticket->relationLoaded('ticketPrizedraws')
                        ? $ticket->ticketPrizedraws->map(function ($ticketPrizedraw) {
                            return [
                                'number' => $ticketPrizedraw->number,
                                'prizedraw' => [
                                    'id' => $ticketPrizedraw->prizedraw->external_prizedraw_id
                                ],
                            ];
                        })
                        : null,
                    'created_at' => $ticket->created_at,
                ],
            ];

            RabbitMQ::sendMessageToExchange(
                message: json_encode($payload),
                exchange: 'tickets',
                routingKey: 'ticket.winner_loser',
                type: 'topic'
            );

            info(
                'Listener SendTicketWinnerToLoserMessage sent message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );
        }

        info('Listener SendTicketWinnerToLoserMessage finished.', ['ticket_id' => $event->ticket->id]);
    }
}
