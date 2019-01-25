<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class User_Sign_In_Control extends Controller
{
    //

    //Ici on affiche juste la page inscription
    public function Sign_in_page(){

        return view('Inscription');
    }




    //Ici on gère l'inscription
    public function Sign_in(){

    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_user'=>['required'],
        'surname_user'=>['required'],
        'localisation_user'=>['required'],
        'email_user'=>['required','email'],
        'password_user'=>['required','confirmed','min:5'],
        'password_user_confirmation'=>['required'],
        ]);


        //ORM
    $user= \App\User::create([
        'Name_user'=>request('name_user'),
        'Surname_user'=>request('surname_user'),
        'Localisation_user'=>request('localisation_user'),
        'Email_user'=>request('email_user'),
        'Password_user'=>bcrypt(request('password_user')),
        'Id_statue'=>'1',

    ]);


    return "Inscription recue";
}
}
