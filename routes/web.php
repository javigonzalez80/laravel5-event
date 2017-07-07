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

Route::get('/', 'PagesController@homepage');

Route::get('fullcalendar', 'PagesController@fullcalendar');

Route::get('calendar', 'PagesController@eventcalendar');

Route::get('list', 'PagesController@eventlist');

Route::get('event/{slug}', 'PagesController@event');

Route::get('error', 'PagesController@error');

Route::get('admin', 'AdminController@dashboard');

Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('events', 'EventsController');
});

Auth::routes();




