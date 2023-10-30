<?php

namespace Setebit\Package;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CreateTicketInvoice
{
    public function handle(array $data): PromiseInterface|Response
    {
        return Http::retry(2, 100)
            ->withToken(token())
            ->post(config('setebit-package.url_api_gateway') . "/invoices", $data);
    }
}
