<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class myaccountDBOps extends Controller
{
    //edit, add, editpwd i delete
    public function edit(Request $request) {
        if(Auth::check()) {
            $id = Auth::id();
            if($request->id == $id) {
                $user = \App\User::find($request->id);
                if($user !== null) {
                    if(isset($request->name)) $user->name = $request->name;
                    if(isset($request->email)) $user->email = $request->email;
                    
                    if($user->save()) {
                        return back()->with('statustext', 'Zmiany zapisane!')->with('status', true);
                    } else {
                        return back()->with('statustext', 'Nie udało się zapisać zmian.')->with('status', false);
                    }
                } else {
                    return back()->with('statustext', 'Nie znaleziono takiego użytkownika.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Nie masz uprawnień do zmiany tego użytkownika!')->with('status',false);
            }
        }
    }

    public function editpwd(Request $request) {
        if(Auth::check()) {
            $id = Auth::id();
            if($request->id == $id) {
                $user = \App\User::find($request->id);
                if($user !== null) {
                    if(isset($request->password)) $user->password = Hash::make($request->password);
                    
                    if($user->save()) {
                        return back()->with('statustext', 'Zmiana hasła pomyślna!')->with('status', true);
                    } else {
                        return back()->with('statustext', 'Nie udało się zmienić hasła.')->with('status', false);
                    }
                } else {
                    return back()->with('statustext', 'Nie znaleziono takiego użytkownika.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Nie masz uprawnień do zmiany tego użytkownika!')->with('status',false);
            }
        }
    }
}
