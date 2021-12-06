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
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', 'HomeController@index')->name('home');

// Authentication routes
Auth::routes();

//Merchant area routes
Route::middleware('auth')->namespace('Merchant')->name('merchant.')->prefix('merchant')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('dishes', 'DishController');
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/statistics', 'OrderController@statistics')->name('orders.statistics');
    Route::get('/order/{order}', 'OrderController@show')->name('order.show');
});
