<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importy dla modeli poszczególnych tabel
use App\stock;
use App\alarm;

class PageController extends Controller
{
    //page controller
    public function home() {
        return view('panel');
    }

    public function login() {
        return view('login');
    }

    public function lostpass() {
        return view('login', ['action' => 'lostpass']);
    }

    public function stock() {
        //pobieramy wszystkie obiekty z bazy
        $stock = stock::all();
        //compact() przekazuje nam dane w formie uproszczonej i bardziej czytelnej
        return view('viewStock', compact('stock'));
    }

    public function refreshStock() {
        $stock = stock::all();

        $html = view('viewStock-table', compact('stock'))->render();

        return response()->json(compact('html'));
    }

    public function stocksearch() {
        return view('viewStock', ['action' => 'search']);
    }

    public function stockadd() {
        return view('viewStock', ['action' => 'addProduct']);
    }

    public function reminders() {
        return view('listReminders');
    }

    public function remindersadd() {
        return view('listReminders', ['action' => 'addReminder']);
    }

    public function users() {
        return view('manageUsers');
    }

    public function usersadd() {
        return view('manageUsers', ['action' => 'addUser']);
    }

    public function myaccount() {
        return view('myAccount');
    }

    public function test() {
        return view('test');
    }
}
