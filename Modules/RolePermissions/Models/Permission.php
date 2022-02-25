<?php

namespace Modules\RolePermissions\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    const PERMISSION_SUPER_ADMIN = 'permission super admin';
    const PERMISSION_ADMIN = 'permission admin';

    // MAIN
    const PERMISSION_MANAGE_PANEL = 'permission panel';

    // USERS
    const PERMISSION_MANAGE_USERS = 'permission users';
    const PERMISSION_MANAGE_ROLE_PERMISSIONS = 'permission role-permissions';

    // MARKETING
    const PERMISSION_MANAGE_CAMPAIGNS = 'permission campaigns';
    const PERMISSION_MANAGE_SURVEYS = 'permission surveys';


    static $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_ADMIN,

        // MAIN
        self::PERMISSION_MANAGE_PANEL,

        // USERS
        self::PERMISSION_MANAGE_USERS,
        self::PERMISSION_MANAGE_ROLE_PERMISSIONS,

        // MARKETING
        self::PERMISSION_MANAGE_CAMPAIGNS,
        self::PERMISSION_MANAGE_SURVEYS,
    ];
}
