<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'panel'], function($router) {
    $router->get('index', 'PanelController@index')->name('panel.index');
});
