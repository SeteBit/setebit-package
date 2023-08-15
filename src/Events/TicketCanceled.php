<?php

namespace Setebit\Package\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketCanceled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Model|Builder $ticket,
        public array $original,
    ) {
        info('Event TicketCanceled dispatched.', ['ticket_id' => $ticket->id]);
    }
}
