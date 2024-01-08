<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketResultAdded;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketWinnerLoserSituationMessage
{
    public function handle(TicketResultAdded $event): void
    {
        info('Listener SendTicketSituationChangeMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $original = $event->original;
        $situation = $this->resolveSituation($ticket->situation);

        if ($situation === 'vencedor') {
            $action = 'winner';
            $prize = ($original['situation'] === 'vencedor') ? $ticket->prize - $original['prize'] : $ticket->prize;
        } elseif ($original['situation'] === 'vencedor' && $situation === 'perdedor') {
            $action = 'winner_to_loser';
            $prize = $original['prize'];
        } else {
            return;
        }

        if ($prize === 0) {
            return;
        }

        $payload = [
            'action' => $action,
            'ticket' => [
                'id' => $ticket->id,
                'user_id' => $ticket->user_id,
                'code' => $ticket->code,
                'situation' => $situation,
                'tenant_id' => $ticket->tenant_id,
                'value' => $ticket->value,
                'prize' => $prize,
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
            'Listener SendTicketSituationChangeMessage sent message to RabbitMQ.',
            ['ticket_id' => $event->ticket->id]
        );
    }

    private function resolveSituation(string|\BackedEnum $situation): string
    {
        if ($situation instanceof \BackedEnum) {
            return $situation->value;
        }

        return $situation;
    }
}
