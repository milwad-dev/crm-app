<?php

use Illuminate\Support\Facades\Route;

// Campaign Routes
Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'verified']], function($router) {
    $router->resource('campaigns', 'Campaign\CampaignController');
});

// Survey Routes
Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'verified']], function($router) {
    $router->resource('surveys', 'Survey\SurveyController');
});
