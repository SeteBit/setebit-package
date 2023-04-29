<?php

return [
    'allowed_headers' => [
        'x-tenant',
        'x-user',
        'x-token',
        'x-permissions'
    ],
    'url_api_gateway' => env('URL_API_GATEWAY', 'https://api.teste.bet'),
];
