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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect','HomeController@redirect')->middleware('auth','verified');

Route::resource('category','CategoryController');

Route::resource('products','ProductController');

Route::get('/product_details/{id}','HomeController@product_details')->name('product_details');



Route::post('/carts/{id}', 'CartController@show')->name('carts');

Route::get('/carts', 'CartController@show_cart')->name('show_cart');

Route::get('/delete/{id}', 'CartController@delete')->name('delete');

Route::get('/cash_order', 'CartController@cash_order')->name('cash_order');

Route::get('/stripe/{total_price}', 'CartController@stripe')->name('stripe');

Route::post('/stripe/{total_price}', 'CartController@stripe_post')->name('stripe.post');



Route::resource('orders','OrderController');

Route::get('/print_pdf/{id}', 'OrderController@print')->name('print_pdf');

Route::get('/send_email/{id}', 'OrderController@send_email')->name('send_email');
Route::post('/send_user_email/{id}', 'OrderController@send_user_email')->name('send_user_email');

Route::get('/Search','OrderController@Search')->name('Search');
Route::get('/show_order','OrderController@show_order')->name('show_order');

Route::get('/cancel_order/{id}', 'OrderController@cancel_order')->name('cancel_order');
Route::resource('comments','CommentController');
Route::get('/Reply','CommentController@Reply')->name('Reply');
Route::get('/delete/{id}', 'CommentController@delete')->name('delete');
Route::get('/product_search','OrderController@product_search')->name('product_search');


Route::get('/all_product','HomeController@all_product')->name('all_product');
