<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('init', function () {
});

Route::get('/', 'IndexController@index')->name('home');
Route::group(['prefix' => 'pjax'], function () {
    Route::get('news', 'PjaxController@news');
    Route::get('push', 'PjaxController@push');
    Route::get('activity', 'PjaxController@activity');
});

Route::get('news', 'IndexController@news');

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index');
    Route::get('tags/{id}', 'PostController@tag');
    Route::get('{id}', 'PostController@show');
});

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'IndexController@index');
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index');
        Route::get('tags/{id}', 'PostController@tag');
        Route::get('create', 'PostController@create');
        Route::post('/', 'PostController@store');
        Route::get('{id}/edit', 'PostController@edit');
        Route::get('{id}', 'PostController@show');
        Route::patch('{id}', 'PostController@update');
        Route::delete('{id}', 'PostController@destroy');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index');
        Route::post('/', 'UserController@store');
        Route::delete('{id}', 'UserController@delete');
    });
    Route::group(['prefix' => 'options'], function () {
        Route::get('/', 'OptionController@edit');
        Route::patch('/', 'OptionController@update');
    });
});
