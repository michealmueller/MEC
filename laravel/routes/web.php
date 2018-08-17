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
Route::get('/change/timezone', 'EventController@index');
Route::get('/privacy', 'HomeController@Privacy');
Route::get('/terms', 'HomeController@Terms');
Route::get('/about-dev', 'HomeController@Dev');
Route::group(['middleware'=>'auth'], function() {

    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');

    Route::get('/create-event', 'EventController@newEvent');
    Route::post('/create-event', 'EventController@createEvent');

    Route::get('/edit/event/{id}', 'EventController@editEvent')->name('edit');
    Route::post('/edit/event/{id}', 'EventController@updateEvent')->name('update');

    Route::get('/remove/event/{id}', 'EventController@removeEvent')->name('remove');
});
Route::get('/view/event/{id}', 'EventController@viewEvent')->name('view');
Route::get('/change_log', 'gitCommitsLog@index')->name('changelog');



//event view routes.

