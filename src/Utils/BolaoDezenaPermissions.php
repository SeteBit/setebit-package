<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BolaoDezenaPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bolão_de_dezenas';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'bolão_de_dezenas.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'bolão_de_dezenas.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_BOLLON = [
        'name' => 'bolão_de_dezenas.listar.bolão_de_dezenas',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_TICKET = [
        'name' => 'bolão_de_dezenas.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'bolão_de_dezenas.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_BOLLON = [
        'name' => 'bolão_de_dezenas.criar.bolão_de_dezenas',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'bolão_de_dezenas.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Validate
     */

    const VALIDATE_TICKET = [
        'name' => 'bolão_de_dezenas.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];


    /**
     * Cancel
     */

    const CANCEL_TICKET = [
        'name' => 'bolão_de_dezenas.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'bolão_de_dezenas.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_BOLLON = [
        'name' => 'bolão_de_dezenas.apagar.bolão_de_dezenas',
        'roles' => [self::ADMIN]
    ];
}
