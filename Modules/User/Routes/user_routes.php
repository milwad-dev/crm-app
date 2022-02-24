<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'verified']], function ($router) {
    $router->post('users/{user}/add/role', 'UserController@addRole')->name('users.addRole');
    $router->delete('users/{user}/remove/{role}/role', 'UserController@removeRole')->name('users.removeRole');
    $router->resource('users', 'UserController');
//    $router->patch('users/{id}/change/status/verify/email', 'UserController@changeStatusEmailVerified')->name('users.change_status_verify_email');
});
