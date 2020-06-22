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

    Route::get('/employees', 'EmployeeController@employees');
    Route::get('/manager', 'EmployeeController@manager');
    Route::get('/clients', 'EmployeeController@clients');
    Route::get('/departments', 'DepartmentController@departments');
    Route::get('/companies', 'CompanyController@companies');

    Route::get('/my-tasks', 'TasksController@myTask');
    Route::get('/my-team', 'TasksController@myTeam');
    Route::get('/task-archive', 'TasksController@archive');

    Route::get('/chat', 'ChatController@chat');
    Route::get('/emailer', 'EmailerController@emailer');

    Route::get('/history-purchase', 'SubscriptionController@historyPurchase');
    Route::get('/income', 'TasksController@income');
    Route::get('/expense', 'TasksController@expense');

    Route::get('/tariff/active', 'TariffController@active');
    Route::get('/tariff/archive', 'TariffController@archive');

    Route::get('/partner', 'UserController@partner');
    Route::get('/subscription', 'SubscriptionController@subscription');
    Route::get('/help', 'ChatController@help');
    Route::get('/about', 'HomeController@about');







});

