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


//Authentication routes
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');