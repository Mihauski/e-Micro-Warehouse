<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //page controller
    public function home() {
        return view('welcome');
    }

    public function login() {
        return view('login');
    }

    public function lostpass() {
        return view('login', ['action' => 'lostpass']);
    }

    public function stock() {
        return view('viewStock')->withTable([
            'item1',
            'item2'
        ]);
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
