<?php

namespace Setebit\Package\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketUpdatedWinner
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Model|Builder $ticket,
    ) {
    }
}
