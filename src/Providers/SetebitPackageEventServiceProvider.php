<?php

namespace Setebit\Package\Providers;

use Setebit\Package\Console\PrizedrawsConsume;
use Setebit\Package\Events\TicketCanceled;
use Setebit\Package\Events\TicketCreated;
use Setebit\Package\Events\TicketUpdatedWinner;
use Setebit\Package\Http\Middleware\BindTheHeader;
use Setebit\Package\Listeners\SendTicketCanceledMessage;
use Setebit\Package\Listeners\SendTicketCreatedMessage;
use Setebit\Package\Listeners\SendTicketUpdatedWinnerMessage;
use Setebit\Package\Services\RabbitMQConnection;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class SetebitPackageEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TicketCreated::class => [
            SendTicketCreatedMessage::class,
        ],
        TicketCanceled::class => [
            SendTicketCanceledMessage::class,
        ],
        TicketUpdatedWinner::class => [
            SendTicketUpdatedWinnerMessage::class,
        ],
    ];
}
