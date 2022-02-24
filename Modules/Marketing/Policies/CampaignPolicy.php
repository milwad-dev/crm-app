<?php

namespace Modules\Marketing\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\RolePermissions\Models\Permission;
use Modules\User\Models\User;

class CampaignPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function manage(User $user)
    {
        if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_CAMPAIGNS) ||
            $user->hasPermissionTo(Permission::PERMISSION_ADMIN))
            return true;
        return false;
    }
}
