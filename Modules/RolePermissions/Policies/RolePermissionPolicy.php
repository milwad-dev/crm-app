<?php

namespace Modules\RolePermissions\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermissions\Models\Permission;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index($user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_ROLE_PERMISSIONS) ||
            $user->hasPermissionTo(Permission::PERMISSION_ADMIN))
            return true;
        return false;
    }
}
