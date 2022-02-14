<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function($router) {
    // Register
    $router->get('register', 'RegisterController@view')->name('register');
    $router->post('register', 'RegisterController@register')->name('register');

    // Login
    $router->get('login', 'LoginController@view')->name('login');
    $router->post('login', 'LoginController@login')->name('login');

    // Logout
    $router->get('password/forget', 'RegisterController@forgot')->name('password.forgot');
});

Route::group(['middleware' => 'auth'], function($router) {
    // Logout
    $router->get('logout', 'LogoutController@logout')->name('logout');
});


