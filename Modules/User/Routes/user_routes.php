<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => 'auth'], function ($router) {
    $router->patch('users/{id}/change/status/verify/email', 'UserController@changeStatusEmailVerified')->name('users.change_status_verify_email');
    $router->resource('users', 'UserController');
});
