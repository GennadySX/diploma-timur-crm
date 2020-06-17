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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@get');


Route::group(['prefix' => '/home'], function () {

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', 'UserController@profile');
        Route::post('/update', 'CustomerController@update');
        Route::post('/update/avatar', 'CustomerController@updateAvatar');
    });

    Route::group(['prefix' => '/receipt'], function () {
        Route::get('/', 'ReceiptController@index');
        Route::get('/new', 'ReceiptController@new');
        Route::post('/create', 'ReceiptController@create');
        Route::get('/edit/{id}', 'ReceiptController@edit');
        Route::post('/update', 'ReceiptController@update');
        Route::get('/delete/{id}', 'ReceiptController@destroy');
    });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
