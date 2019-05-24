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

//routing przerzucony na PageController
Route::get('/', 'PageController@home');
Route::get('/login', 'PageController@login');
Route::get('/login/lostpass', 'PageController@lostpass');
Route::get('/stock', 'PageController@stock')->middleware('auth');
Route::get('/stock/search', 'PageController@stocksearch')->middleware('auth');
Route::post('/stock/add', 'stockDBOps@add')->middleware('auth');
Route::post('/stock/edit', 'stockDBOps@edit')->middleware('auth');
Route::post('/stock/delete', 'stockDBOps@delete')->middleware('auth');
Route::get('/reminders', 'PageController@reminders')->middleware('auth');
Route::get('/reminders/add', 'PageController@remindersadd')->middleware('auth');
Route::get('/users', 'PageController@users')->middleware('auth');
Route::get('/users/add', 'PageController@usersadd')->middleware('auth');
Route::get('/myaccount', 'PageController@myaccount')->middleware('auth');
Route::get('/test', 'PageController@test');
Route::get('/stock/refresh', 'PageController@refreshStock')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
