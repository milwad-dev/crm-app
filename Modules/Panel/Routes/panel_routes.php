<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function($router) {
    $router->get('index', ['uses' => 'PanelController@index', 'as' => 'panel.index']);
});
