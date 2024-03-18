<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BingoPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bingo';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'bingo.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_ROOM = [
        'name' => 'bingo.listar.sala',
        'roles' => [self::ADMIN]
    ];
    const LIST_ROUND = [
        'name' => 'bingo.listar.sala',
        'roles' => [self::ADMIN]
    ];
    const LIST_SETTINGS = [
        'name' => 'bingo.listar.configuração',
        'roles' => [self::ADMIN]
    ];
    const LIST_BOT = [
        'name' => 'bingo.listar.descarga',
        'roles' => [self::ADMIN]
    ];
    const LIST_FINANCIAL = [
        'name' => 'bingo.listar.financeiro',
        'roles' => [self::ADMIN]
    ];
    const LIST_BINGO = [
        'name' => 'bingo.listar.bingo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'bingo.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_ROOM = [
        'name' => 'bingo.atualizar.sala',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_SETTINGS = [
        'name' => 'bingo.atualizar.configuração',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BOT = [
        'name' => 'bingo.atualizar.descarga',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_BINGO = [
        'name' => 'bingo.atualizar.bingo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'bingo.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_ROOM = [
        'name' => 'bingo.apagar.sala',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_BOT = [
        'name' => 'bingo.apagar.descarga',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_BINGO = [
        'name' => 'bingo.apagar.bingo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'bingo.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_ROOM = [
        'name' => 'bingo.criar.sala',
        'roles' => [self::ADMIN]
    ];
    const STORE_BOT = [
        'name' => 'bingo.criar.descarga',
        'roles' => [self::ADMIN]
    ];
    const STORE_BINGO = [
        'name' => 'bingo.criar.bingo',
        'roles' => [self::ADMIN]
    ];

    /**
     * Cancel
     */

    const CANCEL_ROUND = [
        'name' => 'bingo.cancelar.rodada',
        'roles' => [self::ADMIN]
    ];
}
