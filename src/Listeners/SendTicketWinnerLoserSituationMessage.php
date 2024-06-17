<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketResultAdded;
use Setebit\Package\Jobs\SendMessageRabbitMQ;

class SendTicketWinnerLoserSituationMessage
{
    public function handle(TicketResultAdded $event): void
    {
        info('Listener SendTicketSituationChangeMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $originalTicket = $event->original;
        $situationTicket = $this->resolveSituation($ticket->situation);
        $situationOriginalTicket = $this->resolveSituation($originalTicket['situation']);

        if ($situationTicket === 'vencedor') {
            $action = 'winner';
            $prize = ($situationOriginalTicket === 'vencedor') ? $ticket->prize - $originalTicket['prize'] : $ticket->prize;
        } elseif ($situationOriginalTicket === 'vencedor' && $situationTicket === 'perdedor') {
            $action = 'winner_to_loser';
            $prize = $originalTicket['prize'];
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
                'situation' => $situationTicket,
                'tenant_id' => $ticket->tenant_id,
                'value' => $ticket->value,
                'prize' => $prize,
                'used_bonus' => $ticket->used_bonus ?? false,
                'value_bonus_used' => $ticket->value_bonus_used ?? 0,
                'value_used' => $ticket->value_used ?? 0,
                'created_at' => $ticket->created_at?->toDateTimeString(),
            ],
        ];

        SendMessageRabbitMQ::dispatch(
            message: json_encode($payload),
            target: $event->updateBalance ? 'ticket.winner_loser' : '',
            exchange: 'tickets',
            typeExchange: 'topic'
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
