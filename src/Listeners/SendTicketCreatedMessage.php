<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketCreated;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketCreatedMessage
{
    public function handle(TicketCreated $event): void
    {
        $ticket = $event->ticket;

        if (!in_array($ticket->situation, ['rascunho', 'aguardando pagamento'])) {
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
                    'created_at' => $ticket->created_at,
                ],
            ];

            RabbitMQ::sendMessageToExchange(json_encode($payload), 'tickets');
        }
    }
}
