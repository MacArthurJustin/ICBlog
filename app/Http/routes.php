<?php

Route::get('/', 'BlogController@index');
Route::get('post/create', 'BlogController@create');
Route::get('post/{id}', 'BlogController@show');
Route::get('post/{id}/edit', 'BlogController@edit');
Route::get('user/edit', 'BlogController@editUser');
Route::get('user/{id}', 'BlogController@showUser');
Route::get('search', 'BlogController@search');

Route::post('post', 'BlogController@storePost');
Route::post('comment/{id}', 'BlogController@storeComment');

Route::put('post/{id}', 'BlogController@updatePost');
Route::put('user/{id}', 'BlogController@updateUser');

Route::delete('post/{id}', 'BlogController@destroyPost');
Route::delete('comment/{id}', 'BlogController@destroyComment');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
