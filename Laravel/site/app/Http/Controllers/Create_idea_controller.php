<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class Create_idea_controller extends Controller
{
    //

    //Ici on affiche juste la page inscription
    public function Create_idea_page(){

        return view('Create_idea');
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
    $user= Users::create([
        'Name_user'=>request('name_user'),
        'Surname_user'=>request('surname_user'),
        'Localisation_user'=>request('localisation_user'),
        'Email_user'=>request('email_user'),
        'Password_user'=>bcrypt(request('password_user')),
        'Id_status'=>'1',

    ]);


    return "Inscription recue";
}
}
