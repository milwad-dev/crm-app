<?php

use Illuminate\Support\Facades\Route;

// Campaign Routes
Route::group(['prefix' => 'panel'], function($router) {
    $router->resource('campaigns', 'Campaign\CampaignController');
});
