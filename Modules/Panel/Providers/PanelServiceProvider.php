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
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'panelConfig');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/panel_routes.php');
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('panelConfig.items.panel', [
                "icon" => "home",
                "title" => "Panel",
                "url" => route('panel.index'),
                "text" => "Main",
            ]);
        });
    }
}
