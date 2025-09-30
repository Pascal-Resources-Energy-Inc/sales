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

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/otp', 'Auth\ForgotPasswordController@showOtpForm')->name('password.otp');
Route::post('password/verify-otp', 'Auth\ForgotPasswordController@verifyOtp')->name('password.verify-otp');
Route::get('password/reset/form', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset.form');
Route::post('password/update', 'Auth\ForgotPasswordController@reset')->name('password.update');

Route::get('/home', 'HomeController@index')->name('home');

// Product routes
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');


Route::get('/order-payment', function () {
    return view('order');
})->name('order-payment');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/place-order', function () {
    return view('place_order');
})->name('place-order');

Route::get('/merchants', function () {
    return view('merchants');
})->name('merchants');

Route::get('/popular', function () {
    return view('popular');
})->name('popular');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/list_product', function () {
    return view('list_product');
})->name('list_product');

Route::get('/add_product', function () {
    return view('add_product');
})->name('add_product');

Route::get('/manage_store', function () {
    return view('manage_store');
})->name('manage_store');

// Rider Account
Route::get('/rider', function () {
    return view('rider/home');
})->name('rider');