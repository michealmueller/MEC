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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/change/timezone', 'EventController@index');
Route::get('/privacy', 'HomeController@Privacy');
Route::get('/terms', 'HomeController@Terms');
Route::get('/about-dev', 'HomeController@Dev');
Route::get('/faq', 'HomeController@Faq');

Route::group(['middleware'=>'auth'], function() {


    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::post('/profile/generate', 'ProfileController@genRefCode');
    Route::post('/profile/add/lead', 'OrgCalendarController@giveLead');
    Route::post('/profile/remove/lead', 'OrgCalendarController@removeLead');



    Route::get('/create-event', 'EventController@newEvent');
    Route::post('/create-event', 'EventController@createEvent');

    Route::get('/edit/event/{id}', 'EventController@editEvent')->name('edit');
    Route::post('/edit/event/{id}', 'EventController@updateEvent')->name('update');

    Route::post('/update/share', 'ProfileController@updateShare');

    Route::get('/{organization}/calendar', 'OrgCalendarController@index')->name('calendar');
    Route::get('/remove/event/{id}', 'EventController@removeEvent')->name('remove');

        Route::group(['prefix'=>'/admin', 'middleware'=>'isAdmin'], function(){

            Route::get('dashboard', 'AdminController@index');

        });

    Route::get('/request/{id}/{organization_id}/{user_id}', 'OrganizationController@requests');
});
Route::get('/join/ref/{refHash}', 'ReferenceController@verifyRefCode');
Route::post('/join/ref/{refHash}', 'ReferenceController@registerToOrg');

Route::get('/view/event/{id}', 'EventController@viewEvent')->name('view');
Route::get('/change_log', 'gitCommitsLog@index')->name('changelog');

Route::get('find', 'SearchController@find');

Route::get('/bot/discord', 'HomeController@discord');
//event view routes.

