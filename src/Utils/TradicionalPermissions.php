<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class TradicionalPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'tradicional';

    /**
     * List
     */

    const LIST_BIND = [
        'name' => 'tradicional.listar',
        'roles' => [self::ADMIN]
    ];
    const LIST_AUDIT = [
        'name' => 'tradicional.listar.auditoria',
        'roles' => [self::ADMIN]
    ];
    const LIST_EXTRACTION = [
        'name' => 'tradicional.listar.extração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_LOTTERY = [
        'name' => 'tradicional.listar.loteria',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_TICKET = [
        'name' => 'tradicional.listar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const LIST_QUOTATION = [
        'name' => 'tradicional.listar.cotação',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR]
    ];
    const LIST_SETTINGS = [
        'name' => 'tradicional.listar.configuração',
        'roles' => [self::ADMIN, self::MANAGER]
    ];
    const LIST_INSTANT_LOTTERY_FINANCIAL = [
        'name' => 'tradicional.listar.caixa_loteria_instantânea',
        'roles' => [self::ADMIN]
    ];

    /**
     * Update
     */

    const UPDATE_BIND = [
        'name' => 'tradicional.atualizar',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_EXTRACTION = [
        'name' => 'tradicional.atualizar.extração',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_LOTTERY = [
        'name' => 'tradicional.atualizar.loteria',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_MODALITY = [
        'name' => 'tradicional.atualizar.modalidade',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_SETTINGS = [
        'name' => 'tradicional.atualizar.configuração',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_QUOTATION = [
        'name' => 'tradicional.atualizar.cotação',
        'roles' => [self::ADMIN]
    ];
    const UPDATE_INSTANT_LOTTERY_FINANCIAL = [
        'name' => 'tradicional.atualizar.caixa_loteria_instantânea',
        'roles' => [self::ADMIN]
    ];

    /**
     * Destroy
     */

    const DESTROY_BIND = [
        'name' => 'tradicional.apagar',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_EXTRACTION = [
        'name' => 'tradicional.apagar.extração',
        'roles' => [self::ADMIN]
    ];
    const DESTROY_LOTTERY = [
        'name' => 'tradicional.apagar.loteria',
        'roles' => [self::ADMIN]
    ];

    /**
     * Store
     */

    const STORE_BIND = [
        'name' => 'tradicional.criar',
        'roles' => [self::ADMIN]
    ];
    const STORE_EXTRACTION = [
        'name' => 'tradicional.criar.extração',
        'roles' => [self::ADMIN]
    ];
    const STORE_LOTTERY = [
        'name' => 'tradicional.criar.loteria',
        'roles' => [self::ADMIN]
    ];
    const STORE_RESULT = [
        'name' => 'tradicional.criar.resultado',
        'roles' => [self::ADMIN]
    ];

    /**
     * Ticket
     */

    const VALIDATE_TICKET = [
        'name' => 'tradicional.validar.bilhete',
        'roles' => [self::OPERATOR]
    ];
    const CANCEL_TICKET = [
        'name' => 'tradicional.cancelar.bilhete',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const MARK_AS_PAID_TICKET = [
        'name' => 'tradicional.pagar.bilhete',
        'roles' => [self::ADMIN, self::OPERATOR]
    ];
}
