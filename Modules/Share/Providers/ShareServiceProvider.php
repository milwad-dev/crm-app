<?php

namespace Modules\Share\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Share\Components\Auth\Button;
use Modules\Share\Components\Auth\Input;
use Modules\Share\Components\Auth\Label;
use Modules\Share\Components\Auth\OAuth;
use Modules\Share\Components\Panel\Breadcrumb as BreadcrumbPanel;
use Modules\Share\Components\Panel\Input as InputPanel;
use Modules\Share\Components\Panel\Label as LabelPanel;
use Modules\Share\Components\Panel\Button as ButtonPanel;
use Modules\Share\Components\Panel\Select as SelectPanel;
use Modules\Share\Components\Panel\Textarea as TextareaPanel;

class ShareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/', 'Share');
        $this->loadViewComponentsAs('auth', [ // Load Component About Auth
            Input::class, Label::class, Button::class, OAuth::class,
        ]);
        $this->loadViewComponentsAs('panel', [ // Load Component About Panel
            BreadcrumbPanel::class, InputPanel::class, LabelPanel::class, ButtonPanel::class, SelectPanel::class,
            TextareaPanel:: class,
        ]);
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Modules\Share\Database\Factories\\' . class_basename($modelName) .'Factory';
        });
        Route::middleware('web')->group(__DIR__ . '/../Routes/share_routes.php');
    }
}
