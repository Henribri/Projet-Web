<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;

use Illuminate\Support\Facades\Auth;


class Event_user extends Controller
{
    //

    public function View_event(){

    //on verifie si on est connecté
    if(session()->get('Status_user')){

        




        return view('Event');
    }


    return redirect('/connexion')->withErrors([
        'email_user' => 'Veuillez vous authentifier'
        ]);

    }


    public function Sign_in_event(){

        

        if(session()->get('Status_user')){
            //try catch pour tester si un utilisateur s'est déja inscrit à un évènement.
           try{ 
            Sign_in::create([
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

    public function Vote_event(){

        if(session()->get('Status_user')){
            Vote::create([

                'Id_user'=>session()->get('id_user'),
                'Id_event'=> request('num_event'),

            ]);
            return 'Vote bien pris en compte';


        }

    }

}

