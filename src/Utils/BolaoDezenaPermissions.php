<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BolaoDezenaPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bolaoDezena';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'bolaoDezena.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'bolaoDezena.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_BOLLON = [
        'name' => 'bolaoDezena.listar.bolao',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TICKET = [
        'name' => 'bolaoDezena.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'bolaoDezena.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_BOLLON = [
        'name' => 'bolaoDezena.criar.bolao',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'bolaoDezena.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'bolaoDezena.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];


    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'bolaoDezena.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'bolaoDezena.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_BOLLON = [
        'name' => 'bolaoDezena.apagar.bolao',
        'roles' => [self::ADMIN]
    ];
}
