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

Route::get('/', 'BlogController@index');
Route::get('post/create', 'BlogController@create');
Route::get('post/{id}', 'BlogController@show');
Route::get('post/{id}/edit', 'BlogController@edit');
Route::get('user/edit', 'BlogController@editUser');

Route::post('post', 'BlogController@storePost');
Route::post('comment/{id}', 'BlogController@storeComment');

Route::put('post/{id}', 'BlogController@updatePost');
Route::patch('post/{id}', 'BlogController@updatePost');
Route::put('user/{id}', 'BlogController@updateUser');
Route::patch('user/{id}', 'BlogController@updateUser');

Route::delete('post/{id}', 'BlogController@destroyPost');
Route::delete('comment/{id}', 'BlogController@destroyComment');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
