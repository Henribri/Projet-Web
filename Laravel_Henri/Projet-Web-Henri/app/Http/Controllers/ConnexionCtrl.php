<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Statue;


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




    auth()->attempt([

        'Email_user'=>request('email_user'),
        'password'=>request('password_user'),
        ]);



    if(auth()->check()){

        //on prend la personne log in
        $users=auth::user();

        //on declare une session pour dire que le user est bien log(auth ne fonctionnant pas sur les autres pages)

        //inner join pour recuperer le status
        $statue_user = DB::table('_user')
            ->join('_statue', '_user.Id_statue', '=', '_statue.Id_statue')
            ->select('Statue')
            ->where('_user.Id_user', $users->Id_user)
            ->get();


        session()->put('Statue_user', $statue_user[0]->Statue);
        //on met en session l'id de l'utilissateur
        session()->put('Id_user', $users->Id_user);
        session()->put('Email_user', $users->Email_user);
        session()->put('Name_user', $users->Name_user);
        session()->put('Surname_user', $users->Surname_user);
        return redirect('/magasin');
        
    }

    return back()->withInput()->withErrors([
        'email_user' => 'Vos identifiants sont incorrectes',
    ]);

    }
}
