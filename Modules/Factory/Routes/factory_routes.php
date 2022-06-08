<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'panel'], function ($router) {
    $router->get('factories', ['uses' => 'FactoryController@create', 'as' => 'factories.index']);
    $router->post('factories', ['uses' => 'FactoryController@store', 'as' => 'factories.store']);
});
