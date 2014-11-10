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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('user/logout', array('as' => 'logout', 'uses' => 'App\Controllers\AuthController@getLogout'));
Route::get('user/login', array('as' => 'login', 'uses' => 'App\Controllers\AuthController@getLogin'));
Route::post('user/login', array('as' => 'login.post', 'uses' => 'App\Controllers\AuthController@postLogin'));

Route::group(array('before' => 'auth.user'), function()
{
    Route::any('/', function()
    {
        return View::make('hello');
    });
   // Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    //Route::resource('pages', 'App\Controllers\Admin\PagesController');
});
