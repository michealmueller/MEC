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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/', 'EventController@index')->name('calendar');
Route::group(['middleware'=>'auth'], function() {

    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');

    Route::get('/create-event', 'EventController@newEvent');
    Route::post('/create-event', 'EventController@createEvent');
});

