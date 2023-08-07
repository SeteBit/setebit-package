<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SenaBrasilPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'sena_brasil';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'sena_brasil.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'sena_brasil.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_TICKET = [
        'name' => 'sena_brasil.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'sena_brasil.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'sena_brasil.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'sena_brasil.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_CONCOURSE = [
        'name' => 'sena_brasil.atualizar.concurso',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_QUOTATION = [
        'name' => 'sena_brasil.atualizar.cotação',
        'roles' => [self::ADMIN]
    ];

    /**
     * Ticket
     */

    const VALIDATE_TICKET = [
        'name' => 'sena_brasil.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];
    const CANCEL_TICKET = [
        'name' => 'sena_brasil.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR]
    ];
    const MARK_AS_PAID_TICKET = [
        'name' => 'sena_brasil.pagar.bilhete',
        'roles' => [self::ADMIN, self::OPERATOR]
    ];
}
