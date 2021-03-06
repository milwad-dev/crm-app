<?php

namespace Modules\RolePermissions\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\RolePermissions\Database\Seeds\RolePermissionTableSeeder;
use Modules\RolePermissions\Models\Permission;
use Modules\RolePermissions\Models\Role;
use Modules\RolePermissions\Policies\RolePermissionPolicy;

class RolePermissionsServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\RolePermissions\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'RolePermissions');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/rolepermissions_routes.php');
        DatabaseSeeder::$seeders[] = RolePermissionTableSeeder::class;
        Gate::policy(Role::class, RolePermissionPolicy::class);
        Gate::before(function ($user) {return $user->hasPermissionTo(Permission::PERMISSION_SUPER_ADMIN) ? true : null;});
    }

    public function boot()
    {
        config()->set('panelConfig.items.role-permissions', [
            "icon" => "shield",
            "title" => "Role & Permissions",
            "url" => route('role-permissions.index'),
            "text" => null,
            "permission" => Permission::PERMISSION_SUPER_ADMIN,
        ]);
    }
}
