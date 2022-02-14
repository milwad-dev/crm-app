<?php

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['guest', 'throttle:4,1']], function($router) {
Route::group(['middleware' => ['guest']], function($router) {
    // Register
    $router->get('register', 'RegisterController@view')->name('register');
    $router->post('register', 'RegisterController@register')->name('register');

    // Login
    $router->get('login', 'LoginController@view')->name('login');
    $router->post('login', 'LoginController@login')->name('login');

    // Forgot Password
    $router->get('passwords/reset', 'ForgotPasswordController@showVerifyCodeRequestForm')->name('passwords.request');
    $router->get('passwords/reset/send', 'ForgotPasswordController@sendVerifyCodeEmail')->name('passwords.sendVerifyCodeEmail');
    $router->post('passwords/reset/check-verify-code', 'ForgotPasswordController@checkVerifyCode')->name('passwords.checkVerifyCode');


});

Route::group(['middleware' => 'auth'], function($router) {
    $router->get('logout', 'LogoutController@logout')->name('logout'); // Logout

    // Reset Password
    $router->get('passwords/change', 'ResetPasswordController@showResetForm')->name('passwords.showResetForm');
    $router->post('passwords/change', 'ResetPasswordController@reset')->name('passwords.update');
});


