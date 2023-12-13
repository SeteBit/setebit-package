<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketResultAdded;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketWinnerMessage
{
    public function handle(TicketResultAdded $event): void
    {
        info('Listener SendTicketWinnerMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $original = $event->original;

        if (
            $ticket->situation === 'vencedor' &&
            !($ticket->situation === 'vencedor' && $original['situation'] === 'perdedor')
        ) {
            info(
                'Listener SendTicketWinnerMessage sending message to RabbitMQ.',
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
                'action' => 'winner',
                'ticket' => [
                    'id' => $ticket->id,
                    'user_id' => $ticket->user_id,
                    'code' => $ticket->code,
                    'situation' => $ticket->situation,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'prize' => $value,
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
                'Listener SendTicketWinnerMessage sent message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );
        }

        info('Listener SendTicketWinnerMessage finished.', ['ticket_id' => $event->ticket->id]);
    }
}
