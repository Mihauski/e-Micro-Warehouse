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
Route::get('/', 'PageController@home')->name('main');
Route::get('/panel', 'PageController@panel')->middleware('auth');
Route::get('/login', 'PageController@login');
Route::get('/login/lostpass', 'PageController@lostpass');
Route::get('/stock', 'PageController@stock')->middleware('auth');
Route::match(array('GET', 'POST'), '/stock/search', 'stockDBOps@search')->middleware('auth');
Route::post('/stock/add', 'stockDBOps@add')->middleware('auth');
Route::post('/stock/edit', 'stockDBOps@edit')->middleware('auth');
Route::post('/stock/delete', 'stockDBOps@delete')->middleware('auth');
Route::get('/reminders', 'PageController@reminders')->middleware('auth');
Route::post('/reminders/edit', 'remindersDBOps@edit')->middleware('auth');
Route::post('/reminders/delete', 'remindersDBOps@delete')->middleware('auth');
Route::get('/users', 'PageController@users')->middleware('auth');
Route::post('/users/add', 'usersDBOps@add')->middleware('auth');
Route::post('/users/edit', 'usersDBOps@edit')->middleware('auth');
Route::post('/users/delete', 'usersDBOps@delete')->middleware('auth');
Route::post('/users/editpwd', 'usersDBOps@editpwd')->middleware('auth');
Route::get('/myaccount', 'PageController@myaccount')->middleware('auth');
Route::get('/test', 'PageController@test');
Route::get('/stock/refresh', 'PageController@refreshStock')->middleware('auth');
Auth::routes();