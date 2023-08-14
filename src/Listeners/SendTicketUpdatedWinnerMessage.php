<?php

namespace Setebit\Package\Listeners;

use Setebit\Package\Events\TicketUpdatedWinner;
use Setebit\Package\Facades\RabbitMQ;

class SendTicketUpdatedWinnerMessage
{
    public function handle(TicketUpdatedWinner $event): void
    {
        $ticket = $event->ticket;
        $original = $ticket->getOriginal();

        if ($ticket->situation === 'vencedor') {
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
                    'created_at' => $ticket->created_at,
                ],
            ];

            RabbitMQ::sendMessageToExchange(json_encode($payload), 'tickets');
        }
    }
}
