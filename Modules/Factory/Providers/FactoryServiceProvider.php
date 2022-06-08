<?php

namespace Modules\Factory\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\RolePermissions\Models\Permission;

class FactoryServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\Factory\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Factory');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/factory_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.items.factories', [
            "icon" => "box",
            "title" => "Factory",
            "url" => route('factories.index'),
            "text" => null,
            "permission" => Permission::PERMISSION_SUPER_ADMIN,
        ]);
    }
}
