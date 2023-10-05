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

    const LIST_DISCHARGE = [
        'name' => 'seninha.listar.descarga',
        'roles' => [self::ADMIN]
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
}
