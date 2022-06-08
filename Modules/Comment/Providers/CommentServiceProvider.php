<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public $namespace = 'Modules\Comment\Http\Controllers';

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Comment');
        Route::middleware('web')->namespace($this->namespace)->group(__DIR__ . '/../Routes/comment_routes.php');
    }

    public function boot()
    {
        config()->set('panelConfig.items.comments', [
            "icon" => "message-circle",
            "title" => "Comment",
            "url" => route('comments.index'),
            "text" => "Comment",
        ]);
    }
}
