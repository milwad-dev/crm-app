<?php

namespace Modules\User\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Policies\UserPolicy;
use Modules\User\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\User\Http\Controllers';

    public function register()
    {
        config()->set('auth.providers.users.model', User::class);
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'User');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/user_routes.php');
        Gate::policy(User::class, UserPolicy::class);
    }

    public function boot()
    {
        config()->set('panelConfig.items.users', [
            "icon" => "user",
            "title" => "User",
            "url" => route('users.index'),
            "text" => "Users",
        ]);
    }
}
