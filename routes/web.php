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

// Product routes
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::put('/products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');
Route::get('/api/products', 'ProductController@getProducts')->name('products.get');

Route::get('/order-payment', function () {
    return view('order');
})->name('order-payment');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/place-order', function () {
    return view('place_order');
})->name('place-order');

Route::get('/popular', function () {
    return view('popular');
})->name('popular');