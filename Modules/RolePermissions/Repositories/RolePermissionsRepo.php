<?php

namespace Modules\RolePermissions\Repositories;

use Modules\RolePermissions\Models\Permission;
use Modules\Share\Repositories\ShareRepo;
use Spatie\Permission\Models\Role;

class RolePermissionsRepo
{
//    Roles

    public function index()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->whereId($id)->delete();
    }

    private function query()
    {
        return ShareRepo::query(Role::class);
    }

//    Permissions

    public function getAllPermissions()
    {
        return Permission::all();
    }
}
