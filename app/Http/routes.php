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

Route::get('/admin/create', ['as' => 'admin_create_get', 'uses' => 'Admin\AdminCNV@create']);
Route::post('/admin/create', ['as' => 'admin_create_post', 'uses' => 'Admin\AdminCNV@storage']);

Route::get('/admin/gedit/{id}', ['as' => 'admin_regedit_get', 'uses' => 'Admin\AdminCNV@regedit']);
Route::post('/admin/gedit', ['as' => 'admin_regedit_post', 'uses' => 'Admin\AdminCNV@update']);

Route::get('/admin/delete/{id}', ['as' => 'admin_delete_get', 'uses' => 'Admin\AdminCNV@delete']);

Route::get('/admin/gallery', ['as' => 'admin_galery_post', 'uses' => 'Admin\AdminCNV@view']);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');