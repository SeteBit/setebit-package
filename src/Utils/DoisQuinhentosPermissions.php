<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class DoisQuinhentosPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'doisQuinhentos';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'doisQuinhentos.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'doisQuinhentos.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_TICKET = [
        'name' => 'doisQuinhentos.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TWOFIVEHUNDRED = [
        'name' => 'doisQuinhentos.listar.doisQuinhentos',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'doisQuinhentos.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'doisQuinhentos.criar.resultado',
        'roles' => [self::ADMIN]
    ];
    const STORE_TWOFIVEHUNDRED = [
        'name' => 'doisQuinhentos.criar.doisQuinhentos',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'doisQuinhentos.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TWOFIVEHUNDRED = [
        'name' => 'doisQuinhentos.atualizar.doisQuinhentos',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'doisQuinhentos.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];


    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'doisQuinhentos.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'doisQuinhentos.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_TWOFIVEHUNDRED = [
        'name' => 'doisQuinhentos.apagar.doisQuinhentos',
        'roles' => [self::ADMIN]
    ];
}
