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
    const LIST_AUDIT = [
        'name' => 'rifa.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_RAFFLE = [
        'name' => 'rifa.listar.rifa',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TICKET = [
        'name' => 'rifa.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'rifa.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RAFFLE = [
        'name' => 'rifa.criar.rifa',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'rifa.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'rifa.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_RAFFLE = [
        'name' => 'rifa.atualizar.rifa',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'rifa.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];

    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'rifa.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'rifa.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_RAFFLE = [
        'name' => 'rifa.apagar.rifa',
        'roles' => [self::ADMIN]
    ];
}
