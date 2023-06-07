<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class SorteioPermissions
{
    const ADMIN = UserLevel::ADMIN->value;

    public static string $bind = 'sorteio';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'sorteio.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_PRIZEDRAW = [
        'name' => 'sorteio.listar.sorteio',
        'roles' => [self::ADMIN]
    ];
    const LIST_AWARD = [
        'name' => 'sorteio.listar.premio',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'sorteio.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_PRIZEDRAW = [
        'name' => 'sorteio.criar.sorteio',
        'roles' => [self::ADMIN]
    ];
    const STORE_AWARD = [
        'name' => 'sorteio.criar.premio',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'sorteio.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_PRIZEDRAW = [
        'name' => 'sorteio.atualizar.sorteio',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_AWARD = [
        'name' => 'sorteio.atualizar.premio',
        'roles' => [self::ADMIN]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'sorteio.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_PRIZEDRAW = [
        'name' => 'sorteio.apagar.sorteio',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_AWARD = [
        'name' => 'sorteio.apagar.premio',
        'roles' => [self::ADMIN]
    ];
}
