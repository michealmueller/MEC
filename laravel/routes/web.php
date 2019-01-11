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

Auth::routes(['verify'=>true]);
//Misc
Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/change/timezone', 'EventController@index');
Route::get('/privacy', 'HomeController@Privacy');
Route::get('/terms', 'HomeController@Terms');
Route::get('/about-dev', 'HomeController@Dev');
Route::get('/faq', 'HomeController@faq');
Route::get('/join/ref/{refHash}', 'ReferenceController@verifyRefCode');
Route::post('/join/ref/{refHash}', 'ReferenceController@registerToOrg');
Route::get('/view/event/{eventId}', 'EventController@viewEvent')->name('view');
Route::get('/change_log', 'gitCommitsLog@index')->name('changelog');
Route::get('find', 'SearchController@find');


Route::group(['middleware'=>['auth', 'verified']], function() {
    //Profile Routes
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');
    Route::post('/profile/generate', 'OrganizationController@genRefCode');
    Route::post('/profile/add/lead', 'OrgCalendarController@giveLead');
    Route::post('/profile/remove/lead', 'OrgCalendarController@removeLead');
    Route::post('/profile/add/discord_bot', 'ProfileController@addDiscordBot');
    Route::get('/profile/create/organization', 'OrganizationController@index');
    Route::post('/profile/create/organization', 'OrganizationController@create');

    //Single User Routes
    Route::get('/user/{user}/calendar', 'OrgCalendarController@userCal')->name('userCalendar');

    //Organization Routes
    Route::get('/profile/organization/{organization}', 'OrganizationController@profile');
    Route::post('/profile/organization/{organization}', 'OrganizationController@update');
    Route::post('/join/organization/request', 'OrganizationController@join');
    Route::get('/request/{id}/{organization}/{user}', 'OrganizationController@requests');
    Route::post('/update/share', 'OrganizationController@updateShare');
    Route::get('/{organization}/calendar', 'OrgCalendarController@index')->name('calendar');

    //Event Routes
    Route::post('/event/updateAttendance', 'AttendanceController@create')->name('updateAttendance');
    Route::get('/event/get/attendance/{event}', 'AttendanceController@read');
    Route::get('/create-event', 'EventController@newEvent');
    Route::post('/create-event', 'EventController@createEvent');
    Route::get('/edit/event/{id}', 'EventController@editEvent')->name('edit');
    Route::post('/edit/event/{id}', 'EventController@updateEvent')->name('update');
    Route::get('/remove/event/{id}', 'EventController@removeEvent')->name('remove');

    //Subscriptions
    Route::get('/subscription/new', 'SubscriptionController@index');
    Route::post('/subscription/new/monthly', 'SubscriptionController@monthly')->name('subMonthly');
    Route::post('/subscription/new/yearly', 'SubscriptionController@yearly')->name('subYearly');
    Route::post('stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');
    Route::group(['middleware' => 'isSubscribed'], function(){
        Route::get('/subscription/monthly/cancel', 'SubscriptionController@cancelSubscription');
    });

//Admin
    Route::group(['prefix'=>'/admin', 'middleware'=>'isAdmin'], function(){
        Route::get('dashboard', 'AdminController@index');
    });
});
