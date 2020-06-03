<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', 'FrontPageController@index')->name('front-page');
Route::get('detail-product/{id}', 'FrontPageController@detailProduct')->name('detail-product');
Route::get('order', 'FrontPageController@order')->name('order');
Route::post('order', 'FrontPageController@findOrder')->name('find-order');
Route::get('order-item/{code}', 'FrontPageController@orderItem')->name('order-item');
Route::post('order-item/{code}', 'FrontPageController@orderItemStore')->name('order-item-store');

//Login & Register Customer
Route::middleware('guest')->prefix('login')->name('login.')->group(function (){
    Route::get('', 'FrontPageController@showLoginForm')->name('form');
    Route::post('', 'FrontPageController@login')->name('store');
});
Route::middleware('guest')->prefix('register')->name('register.')->group(function (){
    Route::get('', 'FrontPageController@showRegisterForm')->name('form');
    Route::post('', 'FrontPageController@register')->name('store');
});
Route::get('logout', 'FrontPageController@logout')->name('logout');

//Route User
Route::middleware('customer')->group(function (){
    Route::post('add-to-cart/{id}', 'OrderItemController@addToCart')->name('add-to-cart');
    Route::get('detail-cart', 'OrderItemController@detailCart')->name('detail-cart');
    Route::get('delete-item-cart/{id}', 'OrderItemController@deleteItemCart')->name('delete-item-cart');
    Route::post('buy-items', 'OrderItemController@buyItems')->name('buy-items');
});

/* ----------------------------------------------------------------------------------------------------------------- */

//Login & Register Admin
Route::prefix('admin')->name('admin.')->group(function (){
    Auth::routes();
});

//Route Admin
Route::middleware('admin')->prefix('admin')
    ->name('admin.')->namespace('Admin')->group(function (){
        Route::get('', 'AdminController@index')->name('dashboard');
        Route::resource('item', 'ItemController', [
            'parameters' => ['item' => 'id']
        ])->except('update', 'destroy');
        Route::post('item/{id}/update', 'ItemController@itemUpdate')->name('item-update');
        Route::get('item/{id}/delete', 'ItemController@itemDelete')->name('item-delete');
});

Route::prefix('get')->name('get.')->group(function (){
    Route::get('province', 'FillSelectController@province')->name('province');
    Route::get('regency/{province_id}', 'FillSelectController@regency')->name('regency');
    Route::get('district/{regency_id}', 'FillSelectController@district')->name('district');
});

/* ----------------------------------------------------------------------------------------------------------------- */
//Route Super Admin
Route::middleware('super-admin')->prefix('super-admin')
    ->name('super-admin.')->namespace('SuperAdmin')->group(function (){
        Route::get('', 'SuperAdminController@index')->name('dashboard');
        Route::get('user-admin', 'SuperAdminController@userAdmin')->name('user-admin');
        Route::get('user-customer', 'SuperAdminController@userCustomer')->name('user-customer');

        Route::get('order-monitoring', 'SuperAdminController@orderMonitoring')->name('order-monitoring');
        Route::post('order-monitoring', 'SuperAdminController@orderMonitoringStore')->name('order-monitoring-store');
});
