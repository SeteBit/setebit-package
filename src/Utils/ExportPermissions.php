<?php

namespace Setebit\Package\Utils;

use Setebit\Package\Enums\UserLevel;

class ExportPermissions
{
    const ADMIN = UserLevel::ADMIN->value;
    const MANAGER = UserLevel::MANAGER->value;
    const OPERATOR = UserLevel::OPERATOR->value;
    const CUSTOMER = UserLevel::CUSTOMER->value;

    public static string $bind = 'bônus';

    const LIST_EXPORT = [
        'name' => 'exportação.listar',
        'roles' => [self::ADMIN]
    ];

    const DOWNLOAD_EXPORT = [
        'name' => 'exportação.download',
        'roles' => [self::ADMIN]
    ];

    const EXPORT = [
        'name' => 'exportação.exportar',
        'roles' => [self::ADMIN]
    ];
}
