<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SeninhaPermissions
{

    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'seninha';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'seninha.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'seninha.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_TICKET = [
        'name' => 'seninha.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_CONCOURSE = [
        'name' => 'seninha.listar.concurso',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'seninha.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'seninha.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'seninha.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_CONCOURSE = [
        'name' => 'seninha.atualizar.concurso',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MODALITY = [
        'name' => 'seninha.atualizar.modalidade',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'seninha.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];

    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'seninha.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
}
