<?php

namespace Modules\Servey\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermissions\Models\Permission;
use Modules\User\Models\User;

class SurveyPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_SURVEYS) ||
            $user->hasPermissionTo(Permission::PERMISSION_ADMIN))
            return true;
        return false;
    }
}
