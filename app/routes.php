<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('before' => 'auth.login'), function()
{
    Route::get('user/login', array('as' => 'login', 'uses' => 'App\Controllers\AuthController@getLogin'));
    Route::get('user/register', array('as' => 'register', 'uses' => 'App\Controllers\AuthController@getRegister'));
    Route::post('user/login', array('as' => 'login.post', 'uses' => 'App\Controllers\AuthController@postLogin'));
    Route::post('user/register', array('as' => 'register.post', 'uses' => 'App\Controllers\AuthController@postRegister'));
});

Route::group(array('before' => 'auth.user'), function()
{
    Route::get('user/logout', array('as' => 'logout', 'uses' => 'App\Controllers\AuthController@getLogout'));
    Route::any('/', array('as' => 'home', 'uses'=>'App\Controllers\HomeController@index'));
    Route::get('profile', array('as'=>'profile', 'uses'=>'App\Controllers\UserController@profile'));

    Route::get('baby/add', array('as'=>'baby.add', 'uses'=>'App\Controllers\BabyController@add'));
    Route::post('baby/add', array('as'=>'baby.add.post', 'uses'=>'App\Controllers\BabyController@create'));

   // Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    //Route::resource('pages', 'App\Controllers\Admin\PagesController');
});
