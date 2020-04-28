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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/log', "LogController@index")->name('exerciseLog.index');
    Route::get('/publish/{client}', 'LogController@create')->name('exerciseLog.create');
    Route::post('/publish/{client}', 'LogController@store');
    Route::get('/clients', 'ClientController@index')->name('client.index');
    Route::post('/clients', 'ClientController@show');
});

Auth::routes();
