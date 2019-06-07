<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//Importy dla modeli poszczególnych tabel
use App\stock;
use App\alarm;
use App\User;

class PageController extends Controller
{
    private $paginate = 10;

    function smartCheck($alarms) {
        if (Auth::check()) {
            $prevSet = false;
            //funkcja sprawdzająca, czy są warunki do uruchomienia alarmu przy przeładowaniu strony
            foreach($alarms as $alarm) {
                $stock = \App\stock::find($alarm->prod_id);
                //jeśli znaleziono odpowiedni produkt
                if($stock != null) {
                    if($alarm->prog != null) {
                        if($stock->ilosc <= $alarm->prog) {$stock->alarm = 1; $prevSet = true;}
                        if($stock->ilosc > $alarm->prog) $stock->alarm = 0;
                    }
                    if($alarm->deadline != null) {
                        //-7200 to correct two-hours inconsistency
                        if(time() - strtotime($alarm->deadline) > -7200) $stock->alarm = 1;
                        if((time() - strtotime($alarm->deadline) <= -7200) && !$prevSet) $stock->alarm = 0;
                    }
                    $stock->save();
                }
            }
        }
    }

    function checkRole() {
        if (Auth::check()) {
            $id = Auth::id();
            $check = \App\User::find($id);
            $role = $check->role;
            $check = null;
            $id = null;

            return $role;
        }
    }

    public function home() {
        return view('home');
    }

    public function panel() {
        return view('panel');
    }

    public function login() {
        return view('login');
    }

    public function stock() {
        //pobieramy wszystkie obiekty z bazy
        if (Auth::check()) {
            //$stock = stock::all();
            //Od teraz używamy analogicznego pobierania ale za pomocą klasy Sortable z paginacją co X wpisów
            $paginate = 10;
            $alarm = alarm::all();
            //funkcja automatycznego sprawdzania, czy zaszły warunki do uruchomienia alarmu
            $this->smartCheck($alarm);
            $stock = stock::sortable()->orderBy('nazwa', 'asc')->paginate($paginate);
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

    public function reminders() {
        
        $paginate = 10;
        //tutaj kod inicjujący podstr. "Alarmy"
        //nie ma sensu fatygować bazy jeśli ktoś niezalogowany próbuje uzyskać dostęp...
        if(Auth::check()) {
            //tłusty JOIN na dobry początek dnia, żeby nie iterować 2x foreach w widoku
            $res = alarm::sortable()
            ->join('stocks', 'alarms.prod_id', '=', 'stocks.id')
            ->select('alarms.*', 'stocks.nazwa', 'stocks.uwagi', 'stocks.alarm', 'stocks.ilosc')->paginate($paginate);
            $this->smartCheck($res);
        }
        return view('listReminders', compact('res','paginate'));
    }

    public function users() {
        $paginate = 10;
        if(Auth::check()) {
            if($this->checkRole() == 'admin') {
                $users = User::sortable('id','name','email','role','created_at')->paginate($paginate);
                return view('manageUsers', compact('users','id'))->with('verified',true);
            } else {
                return view('manageUsers')->with('statustext', 'Brak wymaganych uprawnień do wyświetlenia tej strony.')->with('status',false);
            }
        }
    }

    public function myaccount() {
        return view('myAccount');
    }

    public function test() {
        return view('test');
    }
}
