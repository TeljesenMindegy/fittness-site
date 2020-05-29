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

    Route::get('/publish', 'PostController@create')->name('post.create');
    Route::post('/publish', 'PostController@store');
    
    Route::get('/posts/update/{post}', 'PostController@edit')->name('post.edit');
    Route::post('/posts/update/{post}', 'PostController@update');
    Route::post('/posts/delete/{post}', 'PostController@destory')->name('post.delete');
    Route::post('/posts/comment/{post}', 'PostController@comment')->name('post.comment');
    Route::post('/comments/reply/{comment}', 'CommentController@comment')->name('comment.reply');

    Route::get('/appointments', 'AppointmentController@index')->name('appointment.index');
    Route::get('/appointments/record', 'AppointmentController@create')->name('appointment.create');
    Route::post('/appointments/record', 'AppointmentController@store');
    Route::get('/appointments/update/{appointment}', 'AppointmentController@edit')->name('appointment.edit');
    Route::post('/appointments/update/{appointment}', 'AppointmentController@update');
    Route::post('/appointments/delete/{appointment}', 'AppointmentController@destroy')->name('appointment.delete');

    Route::group(['middleware' => 'check.role:trainer'], function() {
        Route::get('/clients', 'ClientController@index')->name('client.index');
        Route::post('/clients', 'ClientController@show');
        Route::get('/workout/{client}', 'LogController@create')->name('exerciseLog.create');
        Route::post('/workout/{client}', 'LogController@store');
    });
});
