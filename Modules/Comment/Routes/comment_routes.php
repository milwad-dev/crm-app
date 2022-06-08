<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'panel', 'middleware' => ['auth', 'verified']], function($router) {
    $router->get('comments', ['uses' => 'CommentController@index', 'as' => 'comments.index']);
    $router->delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
    $router->patch('comments/{comment}/accept', ['uses' => 'CommentController@accept', 'as' => 'comments.accept']);
    $router->patch('comments/{comment}/reject', ['uses' => 'CommentController@reject', 'as' => 'comments.reject']);
});
