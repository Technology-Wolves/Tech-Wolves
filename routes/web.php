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

Route::get('/', function () {
    return view('index');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Subscriptions begins

// Store into database
Route::post('/subscriptions', 'SubscriptionController@store');

// Subscriptions ends


// Contacts routes begins

// View COntact page
Route::get('/contacts', 'ContactController@create');

// Store into databse
Route::post('/contacts', 'ContactController@store');

// Contacts routes ends

// Product routes begins
// Go to Product form
Route::get('/addProduct', 'ProductController@create');

// Add Product into database
Route::post('/addProduct', 'ProductController@store')->name('addProduct');

// Product routes ends
