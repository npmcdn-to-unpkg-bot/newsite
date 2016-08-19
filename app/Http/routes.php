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
Route::post('/admin/create-cart', ['as' => 'admin_create_cart_post', 'uses' => 'Admin\AdminCNV@storageCart']);

Route::get('/admin/add/{id}', ['as' => 'admin_create_get', 'uses' => 'Admin\AdminCNV@add']);

Route::get('/admin/cart', ['as' => 'admin_cart_get', 'uses' => 'Admin\AdminCNV@getCart']);

Route::get('/admin/gedit/{id}', ['as' => 'admin_regedit_get', 'uses' => 'Admin\AdminCNV@regedit']);
Route::post('/admin/gedit', ['as' => 'admin_regedit_post', 'uses' => 'Admin\AdminCNV@update']);

Route::get('/admin/delete/{id}', ['as' => 'admin_delete_get', 'uses' => 'Admin\AdminCNV@delete']);

Route::get('/admin/delete-cart/{id}', 'Admin\AdminCNV@deleteCart');

Route::get('/admin/mycnv', ['as' => 'admin_mycnv_get', 'uses' => 'Admin\AdminCNV@myview']);

Route::get('/admin/settings', ['as' => 'admin_sett_get', 'uses' => 'Admin\AdminCNV@getSettings']);
Route::get('/admin/sizeprice', ['as' => 'admin_sizeprice_get', 'uses' => 'Admin\AdminCNV@getSizePrice']);
Route::get('/admin/categories', ['as' => 'admin_cat_get', 'uses' => 'Admin\AdminCNV@getCatSettings']);
Route::get('/admin/orders', ['as' => 'admin_allorder_get', 'uses' => 'Admin\AdminCNV@getAllOrder']);

Route::post('/admin/add_prsize', ['as' => 'admin_add_pr_size_post', 'uses' => 'Admin\AdminCNV@postAddPrSize']);
Route::post('/admin/up_prsize', ['as' => 'admin_up_pr_size_post', 'uses' => 'Admin\AdminCNV@postUpPrSize']);
Route::post('/admin/del_prsize', ['as' => 'admin_del_pr_size_post', 'uses' => 'Admin\AdminCNV@postDelPrSize']);

Route::post('/admin/add_cat', ['as' => 'admin_add_pr_cat_post', 'uses' => 'Admin\AdminCNV@postAddCat']);
Route::post('/admin/up_cat', ['as' => 'admin_up_pr_cat_post', 'uses' => 'Admin\AdminCNV@postUpCat']);
Route::post('/admin/del_cat', ['as' => 'admin_del_pr_cat_post', 'uses' => 'Admin\AdminCNV@postDelCat']);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/gallery', ['as' => 'galery_get', 'uses' => 'PageCNV@views']);

Route::get('/view/{id}', ['as' => 'view_get', 'uses' => 'PageCNV@view']);

Route::get('/', ['as' => 'home_get', 'uses' => 'PageCNV@getHome']);

Route::post('/feedback', ['as' => 'post_feedback', 'uses' => 'PageCNV@postFeedback']);

Route::get('/order', ['as' => 'order_get', 'uses' => 'PageCNV@getOrder']);
Route::post('/order', ['as' => 'order_post', 'uses' => 'PageCNV@postOrder']);

Route::get('/index/{id}', ['as' => 'index_get', 'uses' => 'PageCNV@getIndex']);
