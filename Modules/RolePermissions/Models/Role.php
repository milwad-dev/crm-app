<?php

namespace Modules\RolePermissions\Models;

class Role extends \Spatie\Permission\Models\Role
{
    const ROLE_SUPER_ADMIN = 'role super admin';
    const ROLE_ADMIN = 'role admin';

    const ROLE_PANEL = 'role panel';

    // USERS
    const ROLE_USERS = 'role users';
    const ROLE_ROLE_PERMISSION = 'role role permissions';

    // MARKETING
    const ROLE_CAMPAIGNS = 'role campaigns';
    const ROLE_SURVEYS = 'role surveys';

    // COMMENTS
    const ROLE_COMMENTS = 'role comments';

    static $roles = [
        self::ROLE_SUPER_ADMIN => [Permission::PERMISSION_SUPER_ADMIN],
        self::ROLE_ADMIN => [Permission::PERMISSION_ADMIN],

        // MAIN
        self::ROLE_PANEL => [Permission::PERMISSION_MANAGE_PANEL],

        // USERS
        self::ROLE_USERS => [Permission::PERMISSION_MANAGE_USERS],
        self::ROLE_ROLE_PERMISSION => [Permission::PERMISSION_MANAGE_ROLE_PERMISSIONS],

        // MARKETING
        self::ROLE_CAMPAIGNS => [Permission::PERMISSION_MANAGE_CAMPAIGNS],
        self::ROLE_SURVEYS => [Permission::PERMISSION_MANAGE_SURVEYS],

        // COMMENTS
        self::ROLE_COMMENTS => [Permission::PERMISSION_MANAGE_COMMENTS],
    ];
}
