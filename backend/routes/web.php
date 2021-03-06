<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::group([
    'middleware' => [
        'auth',
        'admin'
    ]
], function () {
    Route::get('', function (Request $request) {
        return redirect()->route('home');
    });

    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('item', 'ItemController')->except(['show']);
    Route::resource('table', 'TableController')->except(['show']);
    Route::resource('category', 'CategoryController')->except(['show']);
    Route::resource('booking', 'BookingController');
    Route::resource('order', 'OrderController')->except(['create', 'store', 'edit', 'update']);
    Route::resource('order-item', 'OrderItemController')->except(['index', 'show', 'create', 'store', 'edit', 'update']);
    Route::resource('user', 'UserController');
    Route::get('user/password/{user}', 'UserController@editPassword')->name('user.editPassword');
    Route::put('user/password/{user}', 'UserController@updatePassword')->name('user.updatePassword');
});
