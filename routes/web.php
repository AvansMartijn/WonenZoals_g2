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
Route::get('/dashboard/gebruikers', 'ManageUsersController@showGebruikers')->middleware('auth');
Route::get('/dashboard/gebruikers/{id}', 'ManageUsersController@showGebruikersDetails')->name('gebruikers')->middleware('auth');
Route::post('/dashboard/gebruikers', 'ManageUsersController@store')->middleware('auth');
Route::delete('/dashboard/gebruikers/{id}', 'ManageUsersController@destroymachtiging')->middleware('auth');
Route::delete('/dashboard/gebruikers/machtigingen/{id}', 'ManageUsersController@destroy')->middleware('auth');
Route::post('/gebruikersupdate', 'ManageUsersController@update')->middleware('auth');

//agenda routes
Route::get('/dashboard/agenda', 'EventsController@index')->name('agenda');
Route::get('/dashboard/agenda/create/meal', 'EventsController@createMeal')->name('agendaCreateMeal');
Route::get('/dashboard/agenda/create/activity', 'EventsController@createActivity')->name('agendaCreateActivity');
Route::post('/dashboard/agenda/create/addEvent', 'EventsController@addEvent')->name('agendaAddEvent');
Route::get('/dashboard/agenda/item/{id}', 'EventsController@detail')->name('agendaDetail');
Route::get('/dashboard/agenda/item/{id}/apply', 'EventsController@apply')->name('agendaApply');
Route::get('/dashboard/agenda/item/{id}/cancel', 'EventsController@cancel')->name('agendaCancel');
Route::get('/dashboard/agenda/item/{id}/cancelEvent', 'EventsController@cancelEvent')->name('agendaCancelActivity');
Route::get('/dashboard/agenda/item/{id}/deleteEvent', 'EventsController@deleteEvent')->name('agendaDeleteActivity');

//niewsbrief archief
Route::get('/dashboard/nieuwsbriefarchief', 'NewsletterArchiveController@index')->middleware('auth');
Route::post('/dashboard/nieuwsbriefarchief', 'NewsletterArchiveController@store')->middleware('auth');
Route::delete('/dashboard/nieuwsbriefarchief/{id}', 'NewsletterArchiveController@destroy')->middleware('auth');

//sections
Route::get('/dashboard/sections', 'SectionsController@index')->name('sections');
Route::get('/dashboard/sections/moveup/{id}', 'SectionsController@moveup');
Route::get('/dashboard/sections/movedown/{id}', 'SectionsController@movedown');
Route::delete('/dashboard/sections/{id}', 'SectionsController@destroy')->middleware('auth');



Route::resource('/dashboard/maaltijden', 'MealsController')->names([
    'create' => 'meals.build',
]);
