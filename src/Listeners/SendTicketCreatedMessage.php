<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCreated;
use Setebit\Package\Jobs\SendMessageRabbitMQ;

class SendTicketCreatedMessage
{
    public function handle(TicketCreated $event): void
    {
        info('Listener SendTicketCreatedMessage handled.', ['ticket_id' => $event->ticket->id]);
        $ticket = $event->ticket;
        $situationTicket = $this->resolveSituation($ticket->situation);

        if (!in_array($situationTicket, ['rascunho', 'aguardando pagamento'])) {
            info(
                'Listener SendTicketCreatedMessage sending message to RabbitMQ.',
                ['ticket_id' => $event->ticket->id]
            );

            $payload = [
                'action' => 'created',
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
                    'created_at' => $ticket->created_at?->toDateTimeString(),
                ],
            ];

            SendMessageRabbitMQ::dispatch(
                message: json_encode($payload),
                target: '',
                exchange: 'tickets',
                typeExchange: 'topic'
            );

            info('Listener SendTicketCreatedMessage sent message to RabbitMQ.', ['ticket_id' => $event->ticket->id]);
        }

        info('Listener SendTicketCreatedMessage finished.', ['ticket_id' => $event->ticket->id]);
    }

    private function resolveSituation(string|\BackedEnum $situation): string
    {
        if ($situation instanceof \BackedEnum) {
            return $situation->value;
        }

        return $situation;
    }
}
