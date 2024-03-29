<?php

return [
    'allowed_headers' => [
        'x-tenant',
        'x-user',
        'x-token',
        'x-permissions'
    ],

    'redis_prizedraw_connection' => env('REDIS_PRIZEDRAW_CONNECTION', 'prizedraw'),

    'url_api_gateway' => env('URL_API_GATEWAY', 'https://api.teste.bet:8443'),
    'url_storage' => env('URL_STORAGE', 'https://storage.teste.bet'),
    'tenant_cache_duration_minutes' => env('TENANT_CACHE_DURATION_MINUTES', 2),
    'tenant_token' => env('TENANT_TOKEN'),

    'rabbitMQ' => [
        'user' => env('RABBITMQ_USER', 'guest'),
        'pass' => env('RABBITMQ_PASS', 'guest'),
        'host' => env('RABBITMQ_HOST', 'localhost'),
        'port' => env('RABBITMQ_PORT', 5672),
        'vhost' => env('RABBITMQ_VHOST', '/'),
    ]
];
