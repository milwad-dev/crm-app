<?php

use Illuminate\Support\Facades\Route;

Route::group([], function ($router) {
    $router->get('/', 'LandingController@index')->name('landing.index');
});
