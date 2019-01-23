<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionCtrl extends Controller
{
    //
    function Log_in(){
    $resultat=auth()->attempt([

        'Email_user'=>request('email_user'),
        'password'=>request('password_user'),

    ]);

    var_dump($resultat);

    return 'connexion en cour';
    }
}
