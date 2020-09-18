<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('foods', 'FoodController');

Route::resource('authorities', 'AuthorityController');

Route::resource('areas', 'AreaController');

Route::resource('users', 'UserController');

Route::resource('bookings', 'BookingController');

Route::resource('histories', 'HistoryController');

Route::resource('companies', 'CompanyController');
