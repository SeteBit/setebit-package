<?php

namespace Setebit\Package\Console;

use Setebit\Package\Workers\PrizedrawsQueueWorker;
use Illuminate\Console\Command;

class PrizedrawsConsume extends Command
{
    protected $signature = 'prizedraws:consume';
    protected $description = 'Command to consume prizedraws queue';

    public function handle(PrizedrawsQueueWorker $prizedrawsQueueWorker): void
    {
        $prizedrawsQueueWorker->run();
    }
}
