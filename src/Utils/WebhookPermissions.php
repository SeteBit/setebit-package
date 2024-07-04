<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class WebhookPermissions
{
    const ADMIN = UserLevel::ADMIN->value;

    public static string $bind = 'webhook';

    const LIST_WEBHOOK = [
        'name' => 'webhook.listar',
        'roles' => [self::ADMIN]
    ];

    const STORE_WEBHOOK = [
        'name' => 'webhook.criar',
        'roles' => [self::ADMIN]
    ];

    const UPDATE_WEBHOOK = [
        'name' => 'webhook.atualizar',
        'roles' => [self::ADMIN]
    ];

    const DELETE_WEBHOOK = [
        'name' => 'webhook.apagar',
        'roles' => [self::ADMIN]
    ];
}
