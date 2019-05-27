<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\stock;
use App\alarm;

class stockDBOps extends Controller
{
    public function edit(Request $request) {
        $id = $request->id;
        $nazwa = $request->nazwa;
        $typ = $request->typ;
        $ilosc = $request->ilosc;
        $jednostka = $request->jednostka;
        $alarm = $request->alarm;
        $uwagi = $request->uwagi;
        $page = $request->page;
        $counter = $request->counter;

        $stock = \App\stock::find($id);
        $alarms = \App\alarm::where('prod_id', $id)->get();

        if(!$alarms->isEmpty()) {
            if($stock->ilosc <= $alarms->prog) {
                $alarm = 1;
            }
            if($stock->ilosc > $alarms->prog) {
                $alarm = 0;
            }
        }

        if(!empty($nazwa)) $stock->nazwa = $nazwa;
        if(!empty($typ)) $stock->typ = $typ;
        if(!empty($ilosc)) $stock->ilosc = $ilosc;
        if(!empty($jednostka)) $stock->jednostka = $jednostka;
        $stock->alarm = $alarm;
        $stock->uwagi = $uwagi;

        
        if($stock->save() == true) {
            //return json_encode("true");
            if(isset($page)) {
                return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status', true);
            } else {
                return redirect('/stock')->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status',true);
            }
        } else {
            if(isset($page)) {
                return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Aktualizacja nie powiodła się!')->with('status', false);
            } else {
            //return json_encode("false");
                return redirect('/stock')->with('statustext', 'Aktualizacja nie powiodła się!')->with('status',false);
            }
        }
    }

    public function add(Request $request) {
        $nazwa = $request->nazwa;
        $typ = $request->typ;
        $ilosc = $request->ilosc;
        $jednostka = $request->jednostka;
        $alarm = 0;
        $uwagi = $request->uwagi ?? null;
        $page = $request->page;
        $counter = $request->counter;

        $stock = new \App\stock;
        $stock->nazwa = $nazwa;
        $stock->typ = $typ;
        $stock->ilosc = $ilosc;
        $stock->jednostka = $jednostka;
        $stock->alarm = $alarm;
        $stock->uwagi = $uwagi;

        if($nazwa != null && $typ != null && $ilosc != null && ($jednostka != null && strlen($jednostka) <= 3)) {
            if($stock->save()) {
                if(isset($page)) {
                    return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Produkt dodany pomyślnie!')->with('status', true);
                } else {
                    return redirect('/stock')->with('statustext', 'Produkt dodany pomyślnie!')->with('status', true);
                }
            }
        } else {
            if(isset($page)) {
                return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Nie udało się dodać produktu.')->with('status', false);
            } else {
                return redirect('/stock')->with('statustext', 'Nie udało się dodać produktu.')->with('status',false);
            }
        }
    }

    public function delete(Request $request) {
        $id = $request->id;
        $stock = \App\stock::find($id);
        $page = $request->page;
        $counter = $request->counter;

        if($stock->count() > 0) {
            if(($stock->delete() == true)) {
                if(isset($page)) {
                    return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Produkt usunięty!')->with('status', true);
                } else {
                    return redirect('/stock')->with('statustext', 'Produkt usunięty!')->with('status', true);
                }
            }
        } else {
            if(isset($page)) {
                return redirect('/stock?page='.$page.'&counter='.$counter)->with('statustext', 'Usuwanie produktu nie powiodło się.')->with('status', false);
            } else {
                return redirect('/stock')->with('statustext', 'Usuwanie produktu nie powiodło się.')->with('status',false);
            }
        }
    }
}
