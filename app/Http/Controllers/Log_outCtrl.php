<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Log_outCtrl extends Controller
{
    

    //--FUNCTION TO LOG OUT
    public function Log_out(){
        
        //--DELETE SESSION
        if(session()->get('Status_user')){

            session()->flush();

            return redirect('/home');
        }


        return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez vous connecter pour vous deconnecter'
            ]);


    }
}