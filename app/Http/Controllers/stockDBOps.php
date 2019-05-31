<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Input;

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
        $alarms = \App\alarm::where('prod_id', $id)->first();

            $prod_id = $id;
            $prog = $request->prog;
            $deadline = $request->deadline;

        if(!$alarms && !empty($alarms->prog)) {
            if(($stock->ilosc <= $alarms->prog) || ($ilosc <= $alarms->prog)) {
                $alarm = 1;
            }
            if(($stock->ilosc > $alarms->prog) || ($ilosc > $alarms->prog)) {
                $alarm = 0;
            }
        }
        if(!$alarms && !empty($alarms->deadline)) {
            if(date('Y-m-d\TH:i:sP') >= $alarms->deadline) {
                $alarm = 1;
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
            if($alarms && $alarm == 1) {
                $newalarm = new \App\alarm;
                $newalarm->prod_id = $prod_id;
                if($prog != null) $newalarm->prog = $prog;
                if($deadline != null) $newalarm->deadline = $deadline;
                
                $newalarm->save();
                
                if($newalarm->prog != null) {
                    if($stock->ilosc <= $newalarm->prog) $stock->alarm = 1;
                    if($stock->ilosc > $newalarm->prog) $stock->alarm = 0;
                    $stock->save();
                }
                if($newalarm->deadline != null) {
                    if(date('Y-m-d\TH:i:sP') >= $newalarm->deadline) {
                        $stock->alarm = 1;
                        $stock->save();
                    }
                }
            }

            if($alarms) {
                if($alarms->prog != null) {
                    if(($stock->ilosc <= $alarms->prog) || $stock->ilosc <= $prog) $stock->alarm = 1;
                    if(($stock->ilosc > $alarms->prog) || ($stock->ilosc > $prog)) $stock->alarm = 0;
                }
                if($alarms->deadline != null) {
                    if((date('Y-m-d\TH:i:sP') >= $alarms->deadline) || (date('Y-m-d\TH:i:sP') >= $deadline)) $stock->alarm = 1;
                    if((date('Y-m-d\TH:i:sP') < $alarms->deadline) || (date('Y-m-d\TH:i:sP') < $deadline)) $stock->alarm = 0;
                }

                $alarms->prog = $prog;
                $alarms->deadline = $deadline;

                $alarms->save();

                $stock->save();
            }

            if(isset($page)) {
                return back()->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status', true)->withInput();
            } else {
                return back()->with('statustext', 'Dane zaktualizowane pomyślnie!')->with('status',true)->withInput();
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
        //For STOCK item
        $nazwa = $request->nazwa;
        $typ = $request->typ;
        $ilosc = $request->ilosc;
        $jednostka = $request->jednostka;
        $uwagi = $request->uwagi ?? null;
        $page = $request->page;
        $counter = $request->counter;
        $alarm = $request->alarm;

        //For item ALARM
        if($alarm == 1) {
            $prod_id = null;
            $prog = $request->prog;
            $deadline = $request->deadline;
        }

        $stock = new \App\stock;
        $stock->nazwa = $nazwa;
        $stock->typ = $typ;
        $stock->ilosc = $ilosc;
        $stock->jednostka = $jednostka;
        $stock->alarm = $alarm;
        $stock->uwagi = $uwagi;

        if($nazwa != null && $typ != null && $ilosc != null && ($jednostka != null && strlen($jednostka) <= 3)) {
            if($stock->save()) {
                //Creating ALARM if set
                if($alarm == 1) {
                    $newalarm = new \App\alarm;
                    $newalarm->prod_id = $stock->id;
                    if($prog != null) $newalarm->prog = $prog;
                    if($deadline != null) $newalarm->deadline = $deadline;
                    $newalarm->save();
                    //deadline or threshold auto-set
                    if($newalarm->prog != null) {
                        if($stock->ilosc <= $newalarm->prog) $stock->alarm = 1;
                        $stock->save();
                    }
                    if($newalarm->deadline != null) {
                        if(date('Y-m-d\TH:i:sP') >= $newalarm->deadline) {
                            $stock->alarm = 1;
                            $stock->save();
                        }
                    }
                }

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
        } else {
            if(!isset($paginate)) $paginate = 5;
            $stock = stock::sortable()->orderBy('nazwa', 'asc')->paginate($paginate);
            return view('viewStock', compact('paginate','stock'));
        }      
    }
}
