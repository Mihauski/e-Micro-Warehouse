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

//routing na stronę powitalną. Resources->Views->[welcome].blade.php
Route::get('/', 'PageController@home');
Route::get('/login', 'PageController@login');
Route::get('/login/lostpass', 'PageController@lostpass');
Route::get('/stock', 'PageController@stock');
Route::get('/stock/search', 'PageController@stocksearch');
Route::get('/stock/add', 'PageController@stockadd');
Route::get('/reminders', 'PageController@reminders');
Route::get('/reminders/add', 'PageController@remindersadd');
Route::get('/users', 'PageController@users');
Route::get('/users/add', 'PageController@usersadd');
Route::get('/myaccounts', 'PageController@myaccount');
Route::get('/test', 'PageController@test');