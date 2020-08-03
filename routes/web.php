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

    // Go to Product form
    Route::get('/addProduct', 'ProductController@create');

    // Go to Product Details
    Route::get('/productDetails/{product}', 'ProductController@productDetails');

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

    //Product Search
    Route::get('/searchProduct', 'ProductController@searchProduct');

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

/* Admin Begins */

    // Get all added products
    Route::get('/getProductsAdmin', 'ProductController@adminIndex');

    //Delete Product Admin
    Route::get('/addedProducts/{product}/adminDelete', 'ProductController@adminDeleteProduct');

    // Get all users
    Route::get('/getAllUsers', 'UserController@getAllUser');

    // Search User
    Route::get('/userSearch', 'UserController@userSearch');

    // Delete User
    Route::get('/deleteUser/{userId}', 'UserController@deleteUser')->name('deleteUser');

/* Admin Ends */

/* Add to Cart Begins */
    // To add products in cart
    Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');

    // To show added product of cart
    Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');

    // Increase Product By 1
    Route::get('/increase/{id}', 'ProductController@getIncrementByOne')->name('product.getIncrementByOne');

    // Reduce Product By 1
    Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');

    //Checkout
    Route::get('/checkout', 'ProductController@getCheckout')->name('checkout')->middleware('auth');

    // Store in DB
    Route::post('/checkout', 'ProductController@postCheckout')->name('checkout')->middleware('auth');
/* Add to Cart Ends */

/* Order Begins */
    // View ordered orders
    Route::get('/viewOrders', 'OrderController@getOrders');

    // Remove Item In Cart
    Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');

    // View All Orders
    Route::get('/getAllOrders', 'OrderController@getAllOrder');

    // Update Order
    Route::put('/updateOrder/{order}', 'OrderController@updateOrder')->name('updateOrder');

    // Short order status page
    Route::get('/shortStatusPage', 'OrderController@shortStatusPage')->name('shortStatusPage');

    // Short order status
    Route::post('/shortStatusResult', 'OrderController@shortStatus');

    // Cancel Order
    Route::get('/orderProduct/{id}', 'OrderController@cancelOrder');
/* Order Ends */

/* Favourite Starts */
    // Add Favourites
    Route::get('/favourite/{productId}', 'FavouriteController@addFavourite');

    // Get Favourites
    Route::get('/favourites', 'FavouriteController@getFavourites');

    // Remove Favourites
    Route::get('/favourites/{fav_id}', 'FavouriteController@removeFavourites');
/* Favourite Ends */
