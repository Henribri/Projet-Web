<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ConnexionCtrl extends Controller
{
    //

    function Formulaire(){

        if(!session()->get('Status_user')){
            
        return view('login');
      
    }
        //TO DO mettre erreur dans la div adapté
        return back()->withErrors([
            'email_user' => 'Vous devez être déconnecté pour pouvoir vous inscrire'
            ]);
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
        $user=auth::user();

        //on declare une session pour dire que le user est bien log(auth ne fonctionnant pas sur les autres pages)

        //inner join pour recuperer le status
        $status_user = DB::table('_user')
            ->join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Status')
            ->where('_user.Id_user', $user->Id_user)
            ->get();


        session()->put('Status_user', $status_user[0]->Status);
        //on met en session l'id de l'utilissateur
        session()->put('Id_user', $user->Id_user);
        session()->put('Email_user', $user->Email_user);
        session()->put('Name_user', $user->Name_user);
        session()->put('Surname_user', $user->Surname_user);
        return redirect('/home');
        
    }

    return back()->withInput()->withErrors([
        'email_user' => 'Vos identifiants sont incorrectes',
    ]);
        

        }



}
