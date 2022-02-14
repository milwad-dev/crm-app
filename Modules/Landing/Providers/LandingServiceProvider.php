<?php

namespace Modules\Landing\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LandingServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\Landing\Http\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Landing');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/landing_routes.php');
    }
}
