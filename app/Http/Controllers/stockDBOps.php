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
                return back()->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status', true);
            } else {
                return back()->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status',true);
            }
        } else {
            if(isset($page)) {
                return back()->with('statustext', 'Aktualizacja nie powiodła się!')->with('status', false);
            } else {
            //return json_encode("false");
                return back()->with('statustext', 'Aktualizacja nie powiodła się!')->with('status',false);
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
                    return back()->with('statustext', 'Produkt dodany pomyślnie!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Produkt dodany pomyślnie!')->with('status', true);
                }
            }
        } else {
            if(isset($page)) {
                return back()->with('statustext', 'Nie udało się dodać produktu.')->with('status', false);
            } else {
                return back()->with('statustext', 'Nie udało się dodać produktu.')->with('status',false);
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
                    return back()->with('statustext', 'Produkt usunięty!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Produkt usunięty!')->with('status', true);
                }
            }
        } else {
            if(isset($page)) {
                return back()->with('statustext', 'Usuwanie produktu nie powiodło się.')->with('status', false);
            } else {
                return back()->with('statustext', 'Usuwanie produktu nie powiodło się.')->with('status',false);
            }
        }
    }

    public function search(Request $request) {
        $val = $request->searchval;
        $con = $request->searchcon;
        $paginate = $request->paginate;
        if (in_array($con, ['nazwa','typ','ilosc','jednostka','alarm'], true ) ) {
            if(($con == 'alarm')) {
                if(strtolower($val) == 'tak') {$val = 1;} else if(strtolower($val) == 'nie') {$val = 0;};
            }
            $count = stock::Query()->where($con, 'LIKE', "%{$val}%")->count();
            $stock = stock::sortable()
            ->where($con, 'LIKE', "%{$val}%") 
            ->paginate($paginate);

            if($stock->count() > 0) {
                return view('viewStock', compact('stock','val','con','paginate'))->with('statustext', 'Znaleziono '.$count.' produktów.')->with('status',true);
            } else {
                return view('viewStock', compact('stock','val','con','paginate'))->with('statustext', 'Nie znaleziono produktów spełniających kryteria.')->with('status',false);
            }
        }       
    }
}
