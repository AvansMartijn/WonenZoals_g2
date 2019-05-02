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

//example
//route to webpage using a function in pagescontroler
Route::get('/', 'PagesController@index');

Route::get('/cmsHome', 'CMSController@cmsHome');

Route::post('/', ['as' => 'contactus.store', 'uses' => 'ContactUSController@contactUSPost']);

//Authentication routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//gebruikers en machtigingen
Route::get('/gebruikers', 'ManageUsersController@showGebruikers')->middleware('auth');
Route::get('/gebruiker/{id}', 'ManageUsersController@showGebruikersDetails')->name('gebruikers')->middleware('auth');
Route::post('/gebruikers', 'ManageUsersController@store')->middleware('auth');
Route::delete('/gebruiker/{id}', 'ManageUsersController@destroymachtiging')->middleware('auth');
Route::delete('/gebruikers/{id}', 'ManageUsersController@destroy')->middleware('auth');

Route::post('/gebruikersupdate', 'ManageUsersController@update')->middleware('auth');
Route::get('/dashboard/agenda', 'EventsController@index')->name('agenda');
Route::get('/dashboard/agenda/create/meal', 'EventsController@createMeal')->name('agendaCreateMeal');
Route::get('/dashboard/agenda/create/activity', 'EventsController@createActivity')->name('agendaCreateActivity');
Route::post('/dashboard/agenda/create/addEvent', 'EventsController@addEvent')->name('agendaAddEvent');
Route::get('/dashboard/agenda/item/{id}', 'EventsController@detail')->name('agendaDetail');
Route::get('/dashboard/agenda/item/{id}/apply', 'EventsController@apply')->name('agendaApply');
Route::get('/dashboard/agenda/item/{id}/cancel', 'EventsController@cancel')->name('agendaCancel');

//niewsbrief archief
Route::get('/dashboard/nieuwsbriefarchief', 'NewsletterArchive@index');

Route::resource('/dashboard/maaltijden', 'MealsController')->names([
    'create' => 'meals.build',
]);