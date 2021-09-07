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


// Route url

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

// Route::get('/password', function ()
// {
//     echo Hash::make('12345678');
// });

// Route Dashboards
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:web,admin',
], function () {
    Route::get('/', 'DashboardController@dashboardAnalytics');
    Route::get('/profile', 'ProfileController@show');

    Route::resource('products', 'ProductController');
    Route::resource('product-types', 'ProductTypeController');
    Route::resource('brands', 'BrandController');
    Route::resource('roles', 'RoleController');
    Route::resource('stocks', 'StockController');
});
Route::get('/', 'HomeController@index');



Route::get('products/{slug}', 'ProductProfileController@index')->name('products.profile');
Route::get('brands/{slug}', 'BrandProfileController@index')->name('brands.profile');


Auth::routes();
