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

Route::get('/admin', ['as' => 'admin_create_get', 'uses' => 'Admin\AdminCNV@create']);
Route::post('/admin', ['as' => 'admin_create_post', 'uses' => 'Admin\AdminCNV@storage']);

Route::get('/admin/gedit/{id}', ['as' => 'admin_regedit_get', 'uses' => 'Admin\AdminCNV@regedit']);
Route::post('/admin/gedit', ['as' => 'admin_regedit_post', 'uses' => 'Admin\AdminCNV@update']);

Route::get('/admin/gallery', ['as' => 'admin_galery_post', 'uses' => 'Admin\AdminCNV@view']);

