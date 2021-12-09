<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Public routes
Route::namespace('Guest')->name('guest.')->prefix('/')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/orders/create', 'GuestOrderController@create')->name('orders.create');
    Route::get('/orders', 'GuestOrderController@index')->name('orders.index');
    Route::post('/orders', 'GuestOrderController@store')->name('orders.store');
});

// Authentication routes
Auth::routes();

//Merchant area routes
Route::middleware('auth')->namespace('Merchant')->name('merchant.')->prefix('merchant')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', 'DishController');
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/statistics', 'OrderController@statistics')->name('orders.statistics');
    Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    Route::get('/profile', 'UserController@show')->name('profile.show');
    Route::get('/profile/edit', 'UserController@edit')->name('profile.edit');
    Route::put('/profile/{user}', 'UserController@update')->name('profile.update');
});

Route::get('/{any}', 'Guest\HomeController@index')->where('any', '.*');
