<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'panel'], function($router) {
    $router->resource('role-permissions', 'RolePermissionsController');
});
