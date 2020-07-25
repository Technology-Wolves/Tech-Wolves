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

/* Product routes begins */
    // Get all added products
    Route::get('/getProductsAdmin', 'ProductController@adminIndex');

    // Go to Product form
    Route::get('/addProduct', 'ProductController@create');

    // Get added Products
    Route::get('/addedProducts', 'ProductController@getAddedProduct')->middleware('auth');

    // Add Product into database
    Route::post('/addProduct', 'ProductController@store')->name('addProduct');

    // Edit Product
    Route::get('/addedProducts/{product}', 'ProductController@editProduct');

    // Update Product
    Route::put('/addedProducts/{product}', 'ProductController@updateProduct')->name('updateProduct');

    //Delete Product
    Route::get('/addedProducts/{product}/delete', 'ProductController@deleteProduct');

    //Delete Product Admin
    Route::get('/addedProducts/{product}/adminDelete', 'ProductController@adminDeleteProduct');
/* Product routes ends */

/* Seller Profile Begins */
    // Get all details
    Route::get('/viewProfile/{userId}', 'UserController@editProfile')->name('viewProfile');

    // Update User Profile
    Route::put('/viewProfile/{userId}', 'UserController@updateUser')->name('updateProfile');

    // Edit Password
    Route::get('/changePassword/{userId}', 'UserController@changePasswordForm')->name('changePassword');

    // Update Password
    Route::put('/changePassword/{userId}', 'UserController@updatePassword')->name('updatePassword');
/* Seller Profile Ends */
