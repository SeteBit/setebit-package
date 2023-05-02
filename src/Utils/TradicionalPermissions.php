<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class TradicionalPermissions
{
    public static string $bind = 'tradicional';

    const LIST_BIND = ['name' => 'tradicional.listar', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_AUDIT = ['name' => 'tradicional.listar.auditoria', 'roles' => [UserLevel::ADMIN->value]];
    const LIST_EXTRACTION = ['name' => 'tradicional.listar.extracao', 'roles' => [UserLevel::MANAGER->value]];
    const LIST_LOTTERY = ['name' => 'tradicional.listar.loteria', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_MODALITY = ['name' => 'tradicional.listar.modalidade', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const LIST_TICKET = ['name' => 'tradicional.listar.bilhete', 'roles' => [UserLevel::MANAGER->value, UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const UPDATE_BIND = ['name' => 'tradicional.atualizar', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_EXTRACTION = ['name' => 'tradicional.atualizar.extracao', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_LOTTERY = ['name' => 'tradicional.atualizar.loteria', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_QUOTAS_MODALITY = ['name' => 'tradicional.atualizar.modalidade.cotas', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_MODALITY = ['name' => 'tradicional.atualizar.modalidade', 'roles' => [UserLevel::ADMIN->value]];
    const UPDATE_SETTINGS = ['name' => 'tradicional.atualizar.configuracoes', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_BIND = ['name' => 'tradicional.apagar', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_EXTRACTION = ['name' => 'tradicional.apagar.extracao', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_LOTTERY = ['name' => 'tradicional.apagar.loteria', 'roles' => [UserLevel::ADMIN->value]];
    const DESTROY_TICKET = ['name' => 'tradicional.apagar.bilhete', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_BIND = ['name' => 'tradicional.criar', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_EXTRACTION = ['name' => 'tradicional.criar.extracao', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_GUESS = ['name' => 'tradicional.criar.palpite', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const STORE_LOTTERY = ['name' => 'tradicional.criar.loteria', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_RESULT = ['name' => 'tradicional.criar.resultado', 'roles' => [UserLevel::ADMIN->value]];
    const STORE_TICKET = ['name' => 'tradicional.criar.bilhete', 'roles' => [UserLevel::OPERATOR->value, UserLevel::CUSTOMER->value]];
    const SHOW_BIND = ['name' => 'tradicional.mostrar', 'roles' => [UserLevel::ADMIN->value]];
    const SHOW_LOTTERY = ['name' => 'tradicional.mostrar.loteria', 'roles' => [UserLevel::MANAGER->value, UserLevel::CUSTOMER->value]];
    const SHOW_SETTINGS = ['name' => 'tradicional.mostrar.configuracoes', 'roles' => [UserLevel::ADMIN->value]];
}