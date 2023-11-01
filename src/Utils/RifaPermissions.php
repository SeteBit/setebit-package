<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class RifaPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'rifa';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'rifa.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_CAMPAIGN = [
        'name' => 'rifa.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_RANKING_CAMPAIGN = [
        'name' => 'rifa.listar',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'rifa.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_CAMPAIGN = [
        'name' => 'rifa.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'rifa.criar',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'rifa.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_CAMPAIGN = [
        'name' => 'rifa.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_STATUS_CAMPAIGN = [
        'name' => 'rifa.atualizar',
        'roles' => [self::ADMIN]
    ];
}
