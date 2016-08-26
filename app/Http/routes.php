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

Route::post('/admin/add_orders', ['as' => 'admin_add_orders_post', 'uses' => 'Admin\AdminCNV@postAddOrders']);

Route::post('/admin/add_prsize', ['as' => 'admin_add_pr_size_post', 'uses' => 'Admin\AdminCNV@postAddPrSize']);
Route::post('/admin/up_prsize', ['as' => 'admin_up_pr_size_post', 'uses' => 'Admin\AdminCNV@postUpPrSize']);
Route::post('/admin/del_prsize', ['as' => 'admin_del_pr_size_post', 'uses' => 'Admin\AdminCNV@postDelPrSize']);

Route::post('/admin/add_cat', ['as' => 'admin_add_cat_post', 'uses' => 'Admin\AdminCNV@postAddCat']);
Route::post('/admin/up_cat', ['as' => 'admin_up_cat_post', 'uses' => 'Admin\AdminCNV@postUpCat']);
Route::post('/admin/del_cat', ['as' => 'admin_del_cat_post', 'uses' => 'Admin\AdminCNV@postDelCat']);

Route::post('/admin/add_slider', ['as' => 'admin_add_slider_post', 'uses' => 'Admin\AdminCNV@postAddSlider']);
Route::post('/admin/up_slider', ['as' => 'admin_up_slider_post', 'uses' => 'Admin\AdminCNV@postUpSlider']);
Route::post('/admin/del_slider', ['as' => 'admin_del_slider_post', 'uses' => 'Admin\AdminCNV@postDelSlider']);

Route::post('/admin/up_logo', ['as' => 'admin_up_logo_post', 'uses' => 'Admin\AdminCNV@postUpLogo']);

Route::post('/admin/up_soc', ['as' => 'admin_up_soc_post', 'uses' => 'Admin\AdminCNV@postUpSoc']);

Route::get('/admin/status', ['as' => 'admin_status_get', 'uses' => 'Admin\AdminCNV@getStatus']);

Route::post('/admin/up_main', ['as' => 'admin_up_main_post', 'uses' => 'Admin\AdminCNV@postUpMain']);

Route::get('/admin/subs', ['as' => 'admin_subs_get', 'uses' => 'Admin\AdminCNV@getSubs']);
Route::get('/admin/del_sub/{id}', ['as' => 'admin_del_subs_get', 'uses' => 'Admin\AdminCNV@delSubs']);

Route::get('/admin/del_user/{id}', ['as' => 'admin_del_user_get', 'uses' => 'Admin\AdminCNV@delUser']);

Route::get('/admin/qa', ['as' => 'admin_qa_get', 'uses' => 'Admin\AdminCNV@getQA']);
Route::post('/admin/del_qa', ['as' => 'admin_del_qa_post', 'uses' => 'Admin\AdminCNV@postDelQA']);
Route::post('/admin/up_qa', ['as' => 'admin_up_qa_post', 'uses' => 'Admin\AdminCNV@postUpQA']);
Route::post('/admin/add_qa', ['as' => 'admin_add_qa_post', 'uses' => 'Admin\AdminCNV@postAddQA']);

Route::get('/admin/menu', ['as' => 'admin_menu_get', 'uses' => 'Admin\AdminCNV@getMenu']);
Route::post('/admin/del_menu', ['as' => 'admin_del_menu_post', 'uses' => 'Admin\AdminCNV@postDelMenu']);
Route::post('/admin/up_menu', ['as' => 'admin_up_menu_post', 'uses' => 'Admin\AdminCNV@postUpMenu']);
Route::post('/admin/add_menu', ['as' => 'admin_add_menu_post', 'uses' => 'Admin\AdminCNV@postAddMenu']);

Route::get('/admin/material', ['as' => 'admin_material_get', 'uses' => 'Admin\AdminCNV@getMaterial']);
Route::post('/admin/add_material', ['as' => 'admin_add_material_post', 'uses' => 'Admin\AdminCNV@postAddMaterial']);
Route::post('/admin/del_material', ['as' => 'admin_del_material_post', 'uses' => 'Admin\AdminCNV@postDelMaterial']);
Route::post('/admin/up_material', ['as' => 'admin_up_material_post', 'uses' => 'Admin\AdminCNV@postUpMaterial']);

Route::get('/admin/wait/{id}', ['as' => 'admin_up_wait_get', 'uses' => 'Admin\AdminCNV@getUpWait']);
Route::get('/admin/done/{id}', ['as' => 'admin_up_done_get', 'uses' => 'Admin\AdminCNV@getUpDone']);

Route::get('/admin/dispatch', 'Admin\AdminCNV@getDispatch');
Route::post('/admin/dispatch', 'Admin\AdminCNV@postDispatch');

Route::get('/conf_order/{email}', 'PageCNV@getConfOrder');
Route::post('/conf_order_send', 'PageCNV@postConfOrderSend');

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/laravel-filemanager', '\Tsawler\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\LfmController@upload');
});

