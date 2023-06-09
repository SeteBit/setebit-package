<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BolaoPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bolão';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'bolão.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'bolão.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_TICKET = [
        'name' => 'bolão.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'bolão.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_BOLLON = [
        'name' => 'bolão.criar.bolão',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'bolão.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'bolão.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BOLLON = [
        'name' => 'bolão.atualizar.bolão',
        'roles' => [self::ADMIN]
    ];

    /**
     * Ticket
     */

    const VALIDATE_TICKET = [
        'name' => 'bolão.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];
    const CANCEL_TICKET = [
        'name' => 'bolão.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const MARK_AS_PAID_TICKET = [
        'name' => 'bolão.pagar.bilhete',
        'roles' => [self::ADMIN, self::OPERATOR]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'bolão.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_BOLLON = [
        'name' => 'bolão.apagar.bolão',
        'roles' => [self::ADMIN]
    ];
}
