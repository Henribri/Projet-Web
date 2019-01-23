<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConnexionCtrl extends Controller
{
    //

    function Formulaire(){

        return view('Connexion');
    }

    function Log_in(){


        request()->validate([
        'email_user'=>['required','email'], //on verifie qur l'utilisateur ne soit pas déjà inscrit
        'password_user'=>['required'],
        ]);




    $resultat=auth()->attempt([

        'Email_user'=>request('email_user'),
        'password'=>request('password_user'),
        ]);



    if(auth()->check()){

        //on prend la personne log in
        $user=auth::user();
        //on declare une session pour dire que le user est bien log(auth ne fonctionnant pas sur les autres pages)
        session()->put('connexion', true);
        //on met en session l'id de l'utilissateur
        session()->put('id_user', $user->Id_user);
        return redirect('/event');
        
    }

    return back()->withInput()->withErrors([
        'email_user' => 'Vos identifiants sont incorrectes',
    ]);

    }
}
