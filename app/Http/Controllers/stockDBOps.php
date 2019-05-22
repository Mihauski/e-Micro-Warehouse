<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\stock;
use App\alarm;

class stockDBOps extends Controller
{
    public function edit() {
       $id = $_POST['id'] ?? null;
       $nazwa = $_POST['nazwa'] ?? null;
       $typ = $_POST['typ'] ?? null;
       $ilosc = $_POST['ilosc'] ?? null;
       $jednostka = $_POST['jednostka'] ?? null;
       $uwagi = $_POST['uwagi'] ?? null;
       $alarm = $_POST['alarm'] ?? null;

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

        $stock->nazwa = $nazwa;
        $stock->typ = $typ;
        $stock->ilosc = $ilosc;
        $stock->jednostka = $jednostka;
        $stock->alarm = $alarm;
        $stock->uwagi = $uwagi;

        $result = $stock->save();
        if($result == true) {
            return json_encode("true");
        } else {
            return json_encode("false");
        }
    }

    public function add() {

    }

    public function delete() {

    }
}
