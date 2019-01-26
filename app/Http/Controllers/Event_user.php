<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;

use App\Events;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class Event_user extends Controller
{
    //

    public function View_events_month(){
        

    //on verifie si on est connecté


        
        $Events = DB::table('events')
            ->join('state', 'events.Id_state', '=', 'state.Id_state')
            ->select('*')
            ->where([
                ['state.state', 'Prochainement'],
                ['Public_event', 1]
            ])
            ->get();
        


        return view('Events_month',[
            'Events'=>$Events,
        ]);
    


    }


    public function View_events_idea(){
        

        //on verifie si on est connecté

            $Events = DB::table('events')
                ->join('state', 'events.Id_state', '=', 'state.Id_state')
                ->select('*')
                ->where([
                    ['state.state', 'Idée'],
                    ['Public_event', 1]
                ])
                ->get();

            return view('Idea_box',[
                'Events'=>$Events,
            ]);

        }

    public function View_events_past(){

        //on verifie si on est connecté

            $Events = DB::table('events')
            ->join('state', 'events.Id_state', '=', 'state.Id_state')
            ->select('*')
            ->where([
                ['state.state', 'Passé'],
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
        
                $Events = DB::table('events')
                ->join('state', 'events.Id_state', '=', 'state.Id_state')
                ->select('*')
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
            Sign_in::create([
                'Id_user'=>session()->get('Id_user'),
                'Id_event'=> request('id_event'),
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

