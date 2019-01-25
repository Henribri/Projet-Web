<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Auth;
use DB;

class User_Connexion extends Controller
{
    //

    function Formulaire()
    {
        return view('Connexion');
    }

    function Log_in(){
        request()->validate([
        'email_user'=>['required','email'], //on verifie qur l'utilisateur ne soit pas déjà inscrit
        'password_user'=>['required'],
        ]);




    $resultat = auth()->attempt([

        'Email_user'=>request('email_user'),
        'password'=>request('password_user'),
        ]);

    if(auth()->check()){

        //on prend la personne log in
        $user=auth::user();

        //on declare une session pour dire que le user est bien log(auth ne fonctionnant pas sur les autres pages)

        //inner join pour recuperer le status
        $statue_user = DB::table('_user')
            ->join('_statue', '_user.Id_statue', '=', '_statue.Id_statue')
            ->select('Statue')
            ->where('_user.Id_user', $user->Id_user)
            ->get();


        session()->put('Statue_user', $statue_user[0]->Statue);
        //on met en session l'id de l'utilissateur
        session()->put('Id_user', $user->Id_user);
        session()->put('Email_user', $user->Email_user);
        session()->put('Name_user', $user->Name_user);
        session()->put('Surname_user', $user->Surname_user);
        return redirect('/mon-compte');
        
    }

    return back()->withInput()->withErrors([
        'email_user' => 'Vos identifiants sont incorrectes',
    ]);

    }
}

