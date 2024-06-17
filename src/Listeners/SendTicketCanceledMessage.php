<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCanceled;
use Setebit\Package\Jobs\SendMessageRabbitMQ;

class SendTicketCanceledMessage
{
    public function handle(TicketCanceled $event): void
    {
        info('Listener SendTicketCanceledMessage handled.', ['ticket_id' => $event->ticket->id]);

        $ticket = $event->ticket;
        $originalTicket = $event->original;
        $situationTicket = $this->resolveSituation($ticket->situation);

        if ($situationTicket === 'cancelado' && empty($originalTicket['canceled_at'])) {
            info(
                'Listener SendTicketCanceledMessage sending message to job SendMessageRabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );

            $payload = [
                'action' => 'canceled',
                'ticket' => [
                    'id' => $ticket->id,
                    'user_id' => $ticket->user_id,
                    'code' => $ticket->code,
                    'situation' => $situationTicket,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'commission' => data_get($ticket, 'commission', 0),
                    'prize' => $ticket->prize,
                    'used_bonus' => $ticket->used_bonus ?? false,
                    'value_bonus_used' => $ticket->value_bonus_used ?? 0,
                    'value_used' => $ticket->value_used ?? 0,
                    'created_at' => $ticket->created_at?->toDateTimeString(),
                ],
            ];

            SendMessageRabbitMQ::dispatch(
                message: json_encode($payload),
                target: '',
                exchange: 'tickets',
                typeExchange: 'topic'
            );

            info(
                'Listener SendTicketCanceledMessage sent message to job SendMessageRabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );
        }

        info('Listener SendTicketCanceledMessage finished.', ['ticket_id' => $event->ticket->id]);
    }

    private function resolveSituation(string|\BackedEnum $situation): string
    {
        if ($situation instanceof \BackedEnum) {
            return $situation->value;
        }

        return $situation;
    }
}
