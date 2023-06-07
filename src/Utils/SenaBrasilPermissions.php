<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SenaBrasilPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'senaBrasil';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'senaBrasil.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'senaBrasil.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_CONCOURSE = [
        'name' => 'senaBrasil.listar.concurso',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TICKET = [
        'name' => 'senaBrasil.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'senaBrasil.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'senaBrasil.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'senaBrasil.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_CONCOURSE = [
        'name' => 'senaBrasil.atualizar.concurso',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_QUOTATION = [
        'name' => 'senaBrasil.atualizar.cotacao',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'senaBrasil.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];


    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'senaBrasil.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
}
