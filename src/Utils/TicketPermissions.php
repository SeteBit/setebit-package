<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class TicketPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bilhete';

    const LIST_TICKET = [
        'name' => 'bilhete.listar',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR, self::CUSTOMER]
    ];
    const VALIDATE_TICKET = [
        'name' => 'bilhete.validar',
        'roles' => [self::OPERATOR]
    ];
    const CANCEL_TICKET = [
        'name' => 'bilhete.cancelar',
        'roles' => [self::ADMIN, self::MANAGER, self::OPERATOR]
    ];
}
