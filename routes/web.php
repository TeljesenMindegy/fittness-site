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
Auth::routes();

Route::get('/', function () { return view('welcome'); });

Route::get('/post/{post}', 'PostController@show')->name('post.show');

Route::get('/profile/{user}','ProfileController@show')->name('profile.show');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/log', "LogController@index")->name('exerciseLog.index');
    Route::get('/workout/{client}', 'LogController@create')->name('exerciseLog.create');
    Route::post('/workout/{client}', 'LogController@store');
    Route::get('/clients', 'ClientController@index')->name('client.index');
    Route::post('/clients', 'ClientController@show');
    Route::get('/publish', 'PostController@create')->name('post.create');
    Route::post('/publish/', 'PostController@store');
});
