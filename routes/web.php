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
    return view('welcome-user');
})->name('user.welcome');

//ルーティング使ってないやつ消す

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('foods', 'FoodController');

Route::resource('users', 'UserController');

Route::get('users/{user}/histories', 'UserController@history')->name('users.histories');

Route::get('users/{user}/historiesCompany', 'UserController@history')->name('users.histories.company');

Route::get('users/{user}/historiesReservation', 'UserController@historyReservation')->name('users.histories.reservation');

Route::get('users/{user}/historiesPurchase', 'UserController@historyPurchase')->name('users.histories.purchase');

Route::resource('bookings', 'BookingController');

Route::resource('companies', 'CompanyController');

Route::post('foods/{food}/reservations', 'BookingController@store')->name('reservations');
Route::post('foods/{food}/unreservations', 'BookingController@destroy')->name('unreservations');

Route::post('foods/{food}/purchase', 'BookingController@store')->name('purchase');
Route::post('foods/{food}/unpurchase', 'BookingController@destroy')->name('unpurchase');

Route::get('foods/{food}/duplicate', 'FoodController@duplicate')->name('foods.duplicate');

Route::get('/contact', function () {
    return view('contacts.contact');
})->name('contacts.contact');

Route::get('/registercompany', function () {
    return view('auth.registercompany');
})->name('registercompany');
