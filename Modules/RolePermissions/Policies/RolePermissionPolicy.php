<?php

namespace Modules\RolePermissions\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermissions\Models\Permission;
use Modules\User\Models\User;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function index(User $user)
    {
//        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_ROLE_PERMISSIONS) ||
//            $user->hasPermissionTo(Permission::PERMISSION_ADMIN))
//            return true;
//        return false;
        if ($user->hasPermissionTo(Permission::PERMISSION_ADMIN))
            return true;
        return false;
    }
}
