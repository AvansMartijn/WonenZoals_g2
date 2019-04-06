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

Route::get('/cmsHome', 'PagesController@cmsHome');

Route::post('/', ['as' => 'contactus.store', 'uses' => 'ContactUSController@contactUSPost']);

//Authentication routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//gebruikers en machtigingen
Route::get('/gebruikers', 'ManageUsersController@showGebruikers');
Route::get('/gebruiker/{id}', 'ManageUsersController@showGebruikersDetails')->name('gebruikers');
Route::post('/gebruikers', 'ManageUsersController@store');
Route::delete('/gebruiker/{id}', 'ManageUsersController@destroymachtiging')->middleware('auth');
Route::delete('/gebruikers/{id}', 'ManageUsersController@destroy')->middleware('auth');

Route::post('/gebruikersupdate', 'ManageUsersController@update');
