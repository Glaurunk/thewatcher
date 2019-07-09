<?php
use App\Http\Controllers\CheckoutController;

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

// Basic Pages Routing
Route::get('/', 'PageController@welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tech-stuff', 'PageController@tech');
Route::get('/policy', 'PageController@policy');

// Resources
Route::resource('authors', 'AuthorController');
Route::resource('books', 'BookController');
Route::get('/books_offers', 'BookController@offers');

// Shop
Route::resource('cart', 'CartController');
Route::resource('checkout', 'CheckoutController');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/pdf', 'CheckoutController@pdf');

// Voyager admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
// Redirecting to Welcome page insted of default rerouting
//Route::get('/admin/login', 'PageController@redirect_home');
//Route::get('/logout', 'PageController@redirect_home');
//Route::get('/admin', 'PageController@redirect_home');

// Authentication. No registration allowed for the demo site
Auth::routes(['register' => false]);
