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



Route::group(['prefix' => '/home'], function () {

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/', 'CustomerController@index');
        Route::post('/update', 'CustomerController@update');
        Route::post('/update/avatar', 'CustomerController@updateAvatar');
    });

    Route::group(['prefix' => '/repair'], function () {
        Route::get('/', 'RepairController@index');
        Route::get('/new', 'RepairController@new');
        Route::post('/create', 'RepairController@create');
        Route::get('/edit/{id}', 'RepairController@edit');
        Route::post('/edit/{id}', 'RepairController@update');
        Route::get('/delete/{id}', 'RepairController@destroy');
    });

    Route::group(['prefix' => '/ring'], function () {
        Route::get('/', 'RingController@index');
        Route::get('/new', 'RingController@new');
        Route::post('/create', 'RingController@create');
        Route::get('/edit/{id}', 'RingController@edit');
        Route::post('/edit/{id}', 'RingController@update');
        Route::get('/delete/{id}', 'RingController@destroy');
    });

    Route::group(['prefix' => '/sum'], function () {
        Route::get('/', 'SumController@index');
        Route::get('/new', 'SumController@new');
        Route::post('/create', 'SumController@create');
        Route::get('/edit/{id}', 'SumController@edit');
        Route::post('/edit/{id}', 'SumController@update');
        Route::get('/delete/{id}', 'SumController@destroy');
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
