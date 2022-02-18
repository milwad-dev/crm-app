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
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Modules\Marketing\Database\Factories\\' . class_basename($modelName) .'Factory' ;
        });
    }

    public function boot()
    {
        config()->set('dashboardConfig.items.campaigns', [
            "icon" => "layout",
            "title" => "Campaign",
            "url" => route('campaigns.index'),
            "text" => "Marketing",
        ]);
    }
}
