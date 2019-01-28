<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Status;
use Illuminate\Support\Facades\DB;
class Users_Sign_In_Control extends Controller
{
    //

    //Ici on affiche juste la page inscription
    public function Sign_in_page(){
        if(!session()->get('Status_user')){

         return view('subscribe');

        }

        //TO DO afficher l'erreur dans la div adapté
        return back()->withErrors([
        'email_user' => 'Vous devez être déconnecté pour pouvoir vous inscrire'
        ]);
    }



    //Ici on gère l'inscription
    public function Sign_in(){



    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_user'=>['required'],
        'surname_user'=>['required'],
        'localisation_user'=>['required'],
        'email_user'=>['required','email','unique:_user,Email_user'], //on verifie qur l'utilisateur ne soit pas déjà inscrit
        'password_user'=>['required','confirmed','min:5','regex:/[A-Z]/','regex:/[0-9]/'],//on verifie qu'il y ai bien une maj et un chiffre
        'password_user_confirmation'=>['required'],
        
        ]);


        $Etudiant = Status::
        select('_status.Id_status')
        ->where('_status.Status', 'Etudiant')
        ->first();


        //ORM
    DB::transaction(function () use ($Etudiant) {
    Users::create([
        'Name_user'=>request('name_user'),
        'Surname_user'=>request('surname_user'),
        'Localisation_user'=>request('localisation_user'),
        'Email_user'=>request('email_user'),
        'Id_status'=>$Etudiant->Id_status,
        'Password_user'=>bcrypt(request('password_user')),


    ]);
    });


    return view('login');
    }


    
}

