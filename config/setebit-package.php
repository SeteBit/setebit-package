<?php

return [
    'allowed_headers' => [
        'x-tenant',
        'x-user',
        'x-token',
        'x-permissions'
    ],
    'url_api_gateway' => env('URL_API_GATEWAY', 'https://api.teste.bet:8000'),

    'rabbitMQ' => [
        'user' => env('RABBITMQ_USER', 'guest'),
        'pass' => env('RABBITMQ_PASS', 'guest'),
        'host' => env('RABBITMQ_HOST', 'localhost'),
        'port' => env('RABBITMQ_PORT', 5672),
        'vhost' => env('RABBITMQ_VHOST', '/'),
        'queue' => env('RABBITMQ_QUEUE', 'default'),
    ]
];
