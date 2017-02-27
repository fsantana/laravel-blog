<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');
Route::get('contact', 'MainController@contact');
Route::get('about', 'MainController@about');
Route::get('post/{id}', 'MainController@post');

/*
 * Substituido pelo codigo abaixo, os são traduzidos do controller
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('', ['as' => 'admin.index', 'uses' => 'Admin\PostsController@index']);

    Route::group(['prefix' => 'posts'], function () {
        Route::get('', ['as' => 'admin.index', 'uses' => 'Admin\PostsController@index']);
        Route::get('create', ['as' => 'admin.posts.create', 'uses' => 'Admin\PostsController@create']);
        Route::post('store', ['as' => 'admin.posts.store', 'uses' => 'Admin\PostsController@store']);
        Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses' => 'Admin\PostsController@edit']);
        Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses' => 'Admin\PostsController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses' => 'Admin\PostsController@destroy']);
    });
});

