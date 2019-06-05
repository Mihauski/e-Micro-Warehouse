<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alarm;
use App\stock;

class remindersDBOps extends Controller
{
    public function edit(Request $request) {
        $id = $request->id;
        $alarm = $request->alarm;
        $prog = $request->prog;
        $deadline = $request->deadline;
        $ilosc = $request->ilosc;
        $prevSet = false;

        $alarms = \App\alarm::find($id);
        $stock = \App\stock::find($alarms->prod_id);

        if($alarm != null) $stock->alarm = $alarm;
        if($prog != null) $alarms->prog = $prog;
        if($deadline != null) $alarms->deadline = $deadline;

        //check for condition to auto-turn an alarm
        if($prog != null) {
            if($ilosc <= $prog) {$stock->alarm = 1; $prevSet = true;}
            if($ilosc > $prog) $stock->alarm = 0;
        }
        if($deadline != null) {
            //if(strtotime(date('Y-m-d\TH:i')) >= date('Y-m-d\TH:i', strtotime($deadline)))
            if(time() - strtotime($deadline) > -7200) $stock->alarm = 1;
            //if(strtotime(date('Y-m-d\TH:i')) <  date('Y-m-d\TH:i', strtotime($deadline)))
            if((time() - strtotime($deadline) <= -7200) && !$prevSet) $stock->alarm = 0;
            $prevSet = false;
        }

        if($alarms->save()) {
            $stock->save();
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

    public function delete(Request $request) {
        $id = $request->id;

        $alarm = \App\alarm::find($id);

        if($alarm->delete()) {
            $stock = \App\stock::find($alarm->prod_id);
            $stock->alarm = 0;
            $stock->save();
            return back()->with('statustext', 'Alarm został usunięty!')->with('status', true)->withInput();
        } else {
            return back()->with('statustext', 'Nie udało się usunąć alarmu!')->with('status',false);
        }
    }
}
