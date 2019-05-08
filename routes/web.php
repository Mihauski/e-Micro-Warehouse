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
Route::get('/', function () {
    return view('welcome');
});

//routing to the login page. Resources->Views->[login].blade.php
Route::get('/login', function() {
    return view('login');
});

Route::get('/login/lostpass', function() {
	return view('login', ['action' => 'lostpass']);
});

//Routing to the stock view
Route::get('/stock', function(){
    //przekazywanie zmiennych wygląda tak:
    //definiujemy sobie jakąś tam zmienną
    /*$table = [
        'item1',
        'item2'
    ];
    //przekazujemy teraz tabelę jako parametr do funkcji view
    return view('viewStock', [
        'table' => $table
    ]);*/

    //albo jeszcze inaczej:
    return view('viewStock')->withTable([
        'item1',
        'item2'
    ]);
});

Route::get('/stock/search', function() {
    return view('viewStock', ['action' => 'search']);
});

Route::get('/stock/add', function() {
    return view('viewStock', ['action' => 'addProduct']);
});

Route::get('/reminders', function() {
    return view('listReminders');
});

Route::get('/reminders/add', function() {
    return view('listReminders', ['action' => 'addReminder']);
});

Route::get('/users', function() {
    return view('manageUsers');
});

Route::get('/users/add', function() {
    return view('manageUsers', ['action' => 'addUser']);
});

Route::get('/myaccount', function() {
    return view('myAccount');
});