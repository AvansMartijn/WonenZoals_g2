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
Route::post('/dashboard', 'DashboardController@store')->middleware('auth');
Route::delete('/dashboard/{id}', 'DashboardController@destroy')->middleware('auth');

//gebruikers en machtigingen
Route::get('/dashboard/gebruikers', 'ManageUsersController@showGebruikers')->middleware('auth');
Route::get('/dashboard/gebruikers/{id}', 'ManageUsersController@showGebruikersDetails')->name('gebruikers')->middleware('auth');
Route::post('/dashboard/gebruikers', 'ManageUsersController@store')->middleware('auth');
Route::delete('/dashboard/gebruikers/verwijderen/{id}/{userid}', 'ManageUsersController@destroymachtiging')->middleware('auth');
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
Route::get('/dashboard/agenda/item/{id}/retainEvent', 'EventsController@retainEvent')->name('agendaRetainActivity');
Route::get('/dashboard/agenda/item/{id}/cancelEvent', 'EventsController@cancelEvent')->name('agendaCancelActivity');
Route::get('/dashboard/agenda/item/{id}/deleteEvent', 'EventsController@deleteEvent')->name('agendaDeleteActivity');
Route::get('/dashboard/agenda/item/{id}/editMeal', 'EventsController@editMeal')->name('agendaEditMeal');
Route::get('/dashboard/agenda/item/{id}/editActivity', 'EventsController@editActivity')->name('agendaEditActivity');
Route::post('/dashboard/agenda/item/{id}/updateEvent', 'EventsController@updateEvent')->name('agendaUpdateEvent');

//niewsbrief archief
Route::get('/dashboard/nieuwsbriefarchief', 'NewsletterArchiveController@index')->middleware('auth');
Route::post('/dashboard/nieuwsbriefarchief', 'NewsletterArchiveController@store')->middleware('auth');
Route::delete('/dashboard/nieuwsbriefarchief/{id}', 'NewsletterArchiveController@destroy')->middleware('auth');

//sections
Route::get('/dashboard/sections', 'SectionsController@index')->name('sections');
Route::get('/dashboard/sections/moveup/{id}', 'SectionsController@moveup');
Route::get('/dashboard/sections/movedown/{id}', 'SectionsController@movedown');
Route::delete('/dashboard/sections/{id}', 'SectionsController@deleteSection')->middleware('auth');
Route::get('/dashboard/sections/factorysettings', 'SectionsController@factorysettings')->name('factorysettings');
Route::post('/dashboard/sections/storeSection', 'SectionsController@storeSection');
Route::get('/dashboard/sections/saveprofile', 'SectionsController@saveProfile')->name('saveProfile');
Route::get('/dashboard/sections/loadprofile', 'SectionsController@loadProfile')->name('loadProfile');


//sponsors
Route::get('/dashboard/sponsors', 'SponsorsController@index')->name('sponsors');
Route::get('/dashboard/sponsors/edit/{id}', 'SponsorsController@showSponsorDetails')->name('sponsorDetails');
Route::post('/dashboard/sponsors/update', 'SponsorsController@update');
Route::get('/dashboard/sponsors/create', 'SponsorsController@create')->name('sponsors.build');
Route::post('/dashboard/sponsors/create', 'SponsorsController@store');
Route::delete('/dashboard/sponsors/delete/{id}', 'SponsorsController@destroy');

//news
Route::get('/dashboard/nieuws', 'NewsController@index');
Route::get('/dashboard/nieuws/create', 'NewsController@create');
Route::post('/dashboard/nieuws/create', 'NewsController@store');
Route::get('/dashboard/nieuws/edit/{id}', 'NewsController@edit');
Route::post('dashboard/nieuws/update', 'NewsController@update');
Route::delete('/dashboard/nieuws/delete/{id}', 'NewsController@destroy');

//Residents
Route::get('/dashboard/bewoners', 'ResidentsController@index');
Route::get('/dashboard/bewoners/create', 'ResidentsController@create');
Route::post('/dashboard/bewoners/create', 'ResidentsController@store');
Route::get('/dashboard/bewoners/edit/{id}', 'ResidentsController@edit');
Route::post('/dashboard/bewoners/update', 'ResidentsController@update');
Route::delete('/dashboard/bewoners/delete/{id}', 'ResidentsController@destroy');

//contact
Route::get('/dashboard/contact', 'ContactUSController@index')->name('contact');
Route::get('/dashboard/contact/subject/{id}', 'ContactUSController@editSubject')->name('contactsubjectEdit');
Route::get('/dashboard/contact/createsubject', 'ContactUSController@createSubject')->name('contactsubjectCreate');
Route::get('/dashboard/location', 'ContactUSController@editLocation')->name('locationEdit');
Route::post('/dashboard/contact/storeSubject', 'ContactUSController@storeSubject');
Route::post('/dashboard/contact/updateSubject', 'ContactUSController@updateSubject');
Route::post('/dashboard/location', 'ContactUSController@updateLocation');
Route::delete('/dashboard/contact/subject/{id}', 'ContactUSController@destroy')->middleware('auth');

//leaf
Route::get('/dashboard/sections/leaf', 'SectionsController@editLeaf')->name('leaf');
Route::post('/dashboard/sections/leaf', 'SectionsController@updateLeaf');

//seperator
Route::get('/dashboard/sections/seperator/edit/{id}', 'SectionsController@editSeperator')->name('sepEdit');
Route::get('/dashboard/sections/seperator/create', 'SectionsController@createSeperator')->name('setCreate');
Route::post('/dashboard/sections/seperator', 'SectionsController@storeSeperator');
Route::post('/dashboard/sections/seperator/edit/', 'SectionsController@updateSeperator');

//textsection
Route::get('/dashboard/sections/text/edit/{id}', 'SectionsController@editTextSection')->name('sepEdit');
Route::get('/dashboard/sections/text/create', 'SectionsController@createTextSection')->name('setCreate');
Route::post('/dashboard/sections/text', 'SectionsController@storeTextSection');
Route::post('/dashboard/sections/text/edit/', 'SectionsController@updateTextSection');

//Route::resource('/dashboard/maaltijden', 'MealsController')->names([
//    'create' => 'meals.build',
//]);
Route::get('/dashboard/maaltijden', 'MealsController@index');
Route::get('/dashboard/maaltijden/{id}', 'MealsController@show');
Route::get('/dashboard/maaltijden/edit/{id}', 'MealsController@edit')->name('meal.edit');
Route::get('/dashboard/maaltijden/delete/{id}', 'MealsController@destroy');
Route::post('/dashboard/maaltijden/update', 'MealsController@update')->name('meal.update');
Route::post('/dashboard/maaltijden/create', 'MealsController@create')->name('meals.build');
Route::post('/dashboard/maaltijden/store', 'MealsController@store');

//forum

Route::get('/dashboard/forum', 'ForumController@index')->middleware('auth')->name('forum');
Route::post('/dashboard/forum', 'ForumController@store')->middleware('auth');
Route::get('/dashboard/forum/topic/{id}', 'ForumController@showTopic')->name('topics')->middleware('auth');
Route::delete('/dashboard/forum/{id}', 'ForumController@deleteTopic')->middleware('auth');

    //reaction
    Route::post('/dashboard/forum/topic', 'ForumController@storeReaction')->middleware('auth');
    Route::delete('/dashboard/forum/topic/{id}', 'ForumController@deleteReaction')->middleware('auth');