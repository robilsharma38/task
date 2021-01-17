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
Route::get('/','HomeController@index');

// Login
Route::get('/login','HomeController@login')->name('login');
Route::post('/admin_login','HomeController@admin_login')->name('admin_login');

// Register
Route::get('/register','HomeController@register')->name('register');
Route::post('/u_register','HomeController@u_register')->name('user_register');

// Logout
Route::post('/logout','HomeController@logout')->name('logout');

// cart
Route::get('/cart','CartController@cart');

// checkout
Route::post('/checkout','CartController@checkout')->name('checkout');

// Success
Route::get('/success','HomeController@success')->name('success');

// Description

Route::get('/p/{slug}','HomeController@description');

Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::group(['middleware'=>['Admin']],function(){
    Route::get('dashboard','AdminController@dashboard')->name('admin_dashboard');
    Route::resource('/product','ProductController');
    Route::get('/get_product_data','ProductController@get_product_data')->name('get_product_data');
    Route::resource('/user','UserController');
    Route::get('/get_user_data','UserController@get_user_data')->name('get_user_data');
});