<?php

namespace Modules\Marketing\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MarketingServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\Marketing\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Marketing');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/marketing_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.items.campaigns', [
            "icon" => "layout",
            "title" => "Campaign",
            "url" => route('campaigns.index'),
            "text" => "Marketing",
        ]);
    }
}
