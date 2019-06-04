<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//Importy dla modeli poszczególnych tabel
use App\stock;
use App\alarm;

class PageController extends Controller
{
    private $paginate = 10;
    //page controller
    public function home() {
        return view('home');
    }

    public function panel() {
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
        if (Auth::check()) {
            //$stock = stock::all();
            //Od teraz używamy analogicznego pobierania ale za pomocą klasy Sortable z paginacją co X wpisów
            $paginate = 10;
            $stock = stock::sortable()->orderBy('nazwa', 'asc')->paginate($paginate);
            $alarm = alarm::all();
        }
        //compact() przekazuje nam dane w formie uproszczonej i bardziej czytelnej
        return view('viewStock', compact('stock', 'alarm', 'paginate'));
    }

    public function refreshStock() {
        if (Auth::check()) {
            $stock = stock::all();
        }

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
        
        $paginate = 10;
        //tutaj kod inicjujący podstr. "Alarmy"
        //nie ma sensu fatygować bazy jeśli ktoś niezalogowany próbuje uzyskać dostęp...
        if(Auth::check()) {
            //tłusty JOIN na dobry początek dnia, żeby nie iterować 2x foreach w widoku
            $res = alarm::sortable()
            ->join('stocks', 'alarms.prod_id', '=', 'stocks.id')
            ->select('alarms.*', 'stocks.nazwa', 'stocks.uwagi', 'stocks.alarm')->paginate($paginate);
        }
        return view('listReminders', compact('res','paginate'));
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
