<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'verified']], function($router) {
    $router->get('super-admin', function() {
       auth()->user()->givePermissionTo(\Modules\RolePermissions\Models\Permission::PERMISSION_SUPER_ADMIN);
       return auth()->user()->permissions;
    });
});
