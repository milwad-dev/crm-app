<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PanelServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\Panel\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Panel');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/panel_routes.php');
    }
}
