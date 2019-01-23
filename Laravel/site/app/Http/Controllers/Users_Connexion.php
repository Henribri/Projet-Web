<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class Users_Connexion extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        request()->validate([
            'email_user' => ['required' , 'email'],
            'password_user' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'Email_user' => request('email_user'),
            'Password_user' => request('password_user'),
        ]);

        var_dump($resultat);

        return 'Traitement formulaire de connexion';
    }
}

