<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;
use App\Users;
use Illuminate\Support\Facades\Auth;

class Event_user extends Controller
{
    //

    public function View_event(){

    //on verifie si on est connecté
    if(auth()->check()||session()->get('connexion')){

        return view('Event');
    }



    }


    public function Sign_in_event(){

        

        if(Auth()->check()||session()->get('connexion')){
            //try catch pour tester si un utilisateur s'est déja inscrit à un évènement.
           try{ 
               $user_sign_in= Sign_in::create([
                'Id_user'=>session()->get('id_user'),
                'Id_event'=> request('num_event'),
            ]);
        }
        catch(\Illuminate\Database\QueryException $e){
                
            return "vous etes déjà inscrit a l'event";
            }

            return 'Bien inscrit';

        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);


        


    }

}

