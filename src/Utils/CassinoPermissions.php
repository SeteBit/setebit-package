<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class CassinoPermissions
{
    const ADMIN = UserLevel::ADMIN->value;

    public static string $bind = 'cassino';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'cassino.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_GAME = [
        'name' => 'cassino.listar.jogos',
        'roles' => [self::ADMIN]
    ];
    const LIST_PROVIDER = [
        'name' => 'cassino.listar.provedores',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'cassino.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_GAME = [
        'name' => 'cassino.atualizar.jogo',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_PROVIDER = [
        'name' => 'cassino.atualizar.provedor',
        'roles' => [self::ADMIN]
    ];
}
