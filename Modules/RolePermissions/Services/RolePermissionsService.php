<?php

namespace Modules\RolePermissions\Services;

use Modules\RolePermissions\Repositories\RolePermissionsRepo;
use Spatie\Permission\Models\Role;
use Modules\Share\Contracts\ServicesInterface;
use Modules\Share\Repositories\ShareRepo;

class RolePermissionsService implements ServicesInterface
{
    private $class = Role::class;

    public function store($request)
    {
        return $this->getData()->create(['name' => $request->name])->syncPermissions($request->permissions);
    }

    public function update($request, $id, $user_id = null)
    {
        $roleRepo = resolve(RolePermissionsRepo::class);
        $role = $roleRepo->findById($id);
        return $role->syncPermissions($request->permissions)->update(['name' => $request->name]);
    }

    private function getData()
    {
        return ShareRepo::query($this->class);
    }
}
