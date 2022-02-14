<?php

namespace Modules\Share\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Share\Components\Auth\Button;
use Modules\Share\Components\Auth\Input;
use Modules\Share\Components\Auth\Label;
use Modules\Share\Components\Auth\OAuth;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Share');
        $this->loadViewComponentsAs('auth', [ // Load Component About Auth
            Input::class, Label::class, Button::class, OAuth::class,
        ]);
    }
}
