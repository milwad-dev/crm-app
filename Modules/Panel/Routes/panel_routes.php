<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'panel'], function($router) {
    $router->get('index', ['uses' => 'PanelController@index', 'as' => 'panel.index']);
});
