<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;

use App\Events;

use App\Vote;
use Illuminate\Support\Facades\DB;
use App\State;
use Illuminate\Support\Facades\Auth;



class Event_user extends Controller
{
    //


    public function View_events_month(){
        

    //on verifie si on est connecté


        
        $Events = Events::
            join('_state', '_event.Id_state', '=', '_state.Id_state')
            ->join('_image', '_image.Id_image','=', '_event.Id_image')
            ->where([
                ['_state.state', 'Month'],
                ['Public_event', 1]
            ])
            ->get();



        


        return view('Events_month',[
            'Events'=>$Events,
        ]);
    


    }


    public function View_events_idea(){
        

            $Events = Events::
                join('_state', '_event.Id_state', '=', '_state.Id_state')

                ->where([
                    ['_state.state', 'Idea'],
                    ['Public_event', 1]
                ])
                ->get();

            return view('Idea_box',[
                'Events'=>$Events,
            ]);

        }

    public function View_events_past(){

        //on verifie si on est connecté

            $Events = Events::
            join('_state', '_event.Id_state', '=', '_state.Id_state')
            ->join('_image', '_image.Id_image','=', '_event.Id_image')
            ->where([
                ['_state.state', 'Past'],
                ['Public_event', 1]
            ])
            ->get();
        
    
            return view('Events_past',[
                'Events'=>$Events,
            ]);
        }

        public function View_events_private(){

            //on verifie si on est connecté
         
            if(session()->get('Status_user')=='BDE'){
        
                $Events = Events::
                join('_state', '_event.Id_state', '=', '_state.Id_state')
                ->join('_image', '_image.Id_image','=', '_event.Id_image')
                ->where('Public_event', 0)
                ->get();
            
        
                return view('Events_private',[
                    'Events'=>$Events,
                ]);}
            
                return back();//Renvoi a la page louis doit prevoir un champs pour les retours d'erreur.
        }

    public function Sign_in_event(){

        

        if(session()->get('Status_user')){
            //try catch pour tester si un utilisateur s'est déja inscrit à un évènement.
           try{ 

            DB::transaction(function () {
            Sign_in::create([
                'Id_user'=>session()->get('Id_user'),
                'Id_event'=> request('id_event'),
            ]);
            });
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

        try{
            if(session()->get('Status_user')){

            DB::transaction(function () {
            Vote::create([

                'Id_user'=>session()->get('Id_user'),
                'Id_event'=> request('id_event'),

            ]);
            });
           
            return 'Vote bien pris en compte';
            }
        
            }catch(\Illuminate\Database\QueryException $e){
                
            return "vous avez deja voté pour l'idée";//renvoyer erreur dans la div info

            }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }

}

