<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class BetsPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bets';

    /**
     * Update
     */
    const UPDATE_BIND = [
        'name' => 'bets.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_EVENT_SETTING = [
        'name' => 'bets.atualizar.evento',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_LEAGUE_SETTING = [
        'name' => 'bets.atualizar.liga',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MARKET_SETTING = [
        'name' => 'bets.atualizar.mercado',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_SPORT_SETTING = [
        'name' => 'bets.atualizar.esporte',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_TENANT_SETTING = [
        'name' => 'bets.atualizar.configurações',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_ODD_BOOSTED = [
        'name' => 'bets.atualizar.odd_aumentada',
        'roles' => [self::ADMIN],
    ];

    /**
     * Store
     */
    const STORE_PRE_MADE_BET = [
        'name' => 'bets.criar.aposta_pronta',
        'roles' => [self::ADMIN],
    ];

    /*
     * Destroy
     */
    const DESTROY_PRE_MADE_BET = [
        'name' => 'bets.apagar.aposta_pronta',
        'roles' => [self::ADMIN],
    ];
    const DESTROY_ODD_BOOSTED = [
        'name' => 'bets.apagar.odd_aumentada',
        'roles' => [self::ADMIN],
    ];
}
