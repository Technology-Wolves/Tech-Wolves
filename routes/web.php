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

//Route::get('/contacts', function () {
//    return view('contacts');
//});


Route::get('/products', function () {
    return view('products');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Contacts routes begins

// View COntact page
Route::get('/contacts', 'ContactController@create');

// Store into databse
Route::post('/contacts', 'ContactController@store');

// Contacts routes ends
