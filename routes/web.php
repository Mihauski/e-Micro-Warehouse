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