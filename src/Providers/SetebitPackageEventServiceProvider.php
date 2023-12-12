<?php

namespace Setebit\Package\Providers;

use Setebit\Package\Events\TicketCanceled;
use Setebit\Package\Events\TicketCreated;
use Setebit\Package\Events\TicketResultAdded;
use Setebit\Package\Listeners\SendTicketCanceledMessage;
use Setebit\Package\Listeners\SendTicketCreatedMessage;
use Setebit\Package\Listeners\SendTicketWinnerMessage;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Setebit\Package\Listeners\SendTicketWinnerToLoserMessage;

class SetebitPackageEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        TicketCreated::class => [
            SendTicketCreatedMessage::class,
        ],
        TicketCanceled::class => [
            SendTicketCanceledMessage::class,
        ],
        TicketResultAdded::class => [
            SendTicketWinnerMessage::class,
            SendTicketWinnerToLoserMessage::class,
        ],
    ];
}
