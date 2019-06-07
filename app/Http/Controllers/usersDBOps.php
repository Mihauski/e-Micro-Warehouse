<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class usersDBOps extends Controller
{
    //helper function for rolecheck
    function checkRole() {
        //if logged in...
        if (Auth::check()) {
            $id = Auth::id();
            $check = \App\User::find($id);
            $role = $check->role;
            $check = null;
            $id = null;

            return $role;
        }
    }

    //edit, add, editpwd i delete
    public function add(Request $request) {
        if($this->checkRole() == 'admin') {
            $user = new \App\User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->pass);
            $user->role = $request->role;

            $search = \App\User::where('email', $request->email)->first();
            if($search === null) {
                if($user->save()) {
                    return back()->with('statustext', 'Dodano użytkownika!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Nie udało się dodać użytkownika.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Taki użytkownik już istnieje.')->with('status', false);
            } 
        } else {
            return back()->with('statustext', 'Nie masz uprawnień do tej akcji!')->with('status', false);
        }
    }

    public function edit(Request $request) {
        if($this->checkRole() == 'admin') {
            $user = \App\User::find($request->id);
            if($user !== null) {
                if(isset($request->name)) $user->name = $request->name;
                if(isset($request->email)) $user->email = $request->email;
                if(isset($request->pass)) $user->password = Hash::make($request->pass);
                if(isset($request->role) && $user->id != 1) {$user->role = $request->role;} else {
                    return back()->with('statustext', 'Główny administrator nie może być zdegradowany!')->with('status', false);
                }
                
                if($user->save()) {
                    return back()->with('statustext', 'Zmodyfikowano użytkownika!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Nie udało się zmodyfikować użytkownika.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Nie znaleziono takiego użytkownika.')->with('status', false);
            }
        }
    }

    public function editpwd(Request $request) {
        if($this->checkRole() == 'admin') {
            $user = \App\User::find($request->id);
            if($user !== null) {
                if(isset($request->password)) $user->password = Hash::make($request->password);

                if($user->save()) {
                    return back()->with('statustext', 'Hasło zostało zmienione!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Nie udało się zmienić hasła.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Nie znaleziono takiego użytkownika.')->with('status', false);
            }
        }
    }

    public function delete(Request $request) {
        if($this->checkRole() == 'admin') {
            $user = \App\User::find($request->id);
            if($user !== null) {
                if($user->delete()) {
                    return back()->with('statustext', 'Użytkownik usunięty!')->with('status', true);
                } else {
                    return back()->with('statustext', 'Nie udało się usunąć użytkownika.')->with('status', false);
                }
            } else {
                return back()->with('statustext', 'Nie znaleziono takiego użytkownika.')->with('status', false);
            }
        }
    }
}
