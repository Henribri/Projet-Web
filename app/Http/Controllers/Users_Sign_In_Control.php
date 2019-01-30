<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Status;
use Illuminate\Support\Facades\DB;
class Users_Sign_In_Control extends Controller
{


    //--VIEW SIGN IN
    public function Sign_in_page(){
        
        if(!session()->get('Status_user')){

         return view('subscribe');

        }

        return back()->withErrors([
        'email_user' => 'Vous devez être déconnecté pour pouvoir vous inscrire'
        ]);
    }



    //--FUNCTION TO SIGN IN
    public function Sign_in(){

    request()->validate([
        'name_user'=>['required'],
        'surname_user'=>['required'],
        'localisation_user'=>['required'],
        'email_user'=>['required','email','unique:_user,Email_user'],
        'password_user'=>['required','confirmed','min:5','regex:/[A-Z]/','regex:/[0-9]/'],
        'password_user_confirmation'=>['required'],
        
        ]);

        //--FIND ID OF ETUDIANT
        $Etudiant = Status::
        select('_status.Id_status')
        ->where('_status.Status', 'Etudiant')
        ->first();


        //--CREATE A NEW USER
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

