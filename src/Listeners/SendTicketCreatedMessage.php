<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCreated;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketCreatedMessage
{
    public function handle(TicketCreated $event): void
    {
        info('Listener SendTicketCreatedMessage handled.', ['ticket_id' => $event->ticket->id]);
        $ticket = $event->ticket;

        if (!in_array($ticket->situation, ['rascunho', 'aguardando pagamento'])) {
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
                    'situation' => $ticket->situation,
                    'tenant_id' => $ticket->tenant_id,
                    'value' => $ticket->value,
                    'commission' => $ticket->commission,
                    'prize' => $ticket->prize,
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

            RabbitMQ::sendMessageToExchange(json_encode($payload), 'tickets');

            info('Listener SendTicketCreatedMessage sent message to RabbitMQ.', ['ticket_id' => $event->ticket->id]);
        }

        info('Listener SendTicketCreatedMessage finished.', ['ticket_id' => $event->ticket->id]);
    }
}
