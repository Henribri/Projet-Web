<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class list_user_controller extends Controller
{
    public function display_user()
    {
        $users = \App\User::all();
    
        return view('List_user', [
            'users' => $users
        ]);
    }
}
