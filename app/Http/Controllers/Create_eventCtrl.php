<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use App\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App\Mail\IdeeRetenue;

class Create_eventCtrl extends Controller
{

    public function View_create_idea(){
        
        if(session()->get('Status_user')){
            return view('create_idea');
        }


        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }

    
    public function View_create_event(){
        


        if(session()->get('Status_user')=='BDE'){


            $Ideas=false;
            if(request('id_event')){
                $Ideas = DB::table('events')
                ->select('*')
                ->where([
                    ['Id_event', request('id_event')],
                ])
                ->get();
            }


            return view('create_event',[
                'Ideas'=>$Ideas,
            ]);
        }


        return 'Vous devez etre membre du bde';

    }


    //
    public function Create_event(){
        //TODO Session a verifier status = BDE
        if(session()->get('Status_user')=='BDE'){
            
    request()->validate([
        //on verifie le formulaire
        'name_event'=>['required','unique:events,Name_event'],
        'description_event'=>['required'],
        'date_event'=>['required'],
        'recurent_event'=>['required'], 
        'public_event'=>['required'], 
        'cost_event'=>['required'],

        
        ]);

        //ORM      
        //on cherche l'id du status evenement
          $Status = DB::table('state')
            ->select('Id_state')
            ->where('State', 'Prochainement')
            ->get();

        Events::create([
        'Name_event'=>request('name_event'),
        'Description_event'=>request('description_event'),
        'Date_event'=>request('date_event'),
        'Recurent_event'=>request('recurent_event'),
        'Cost_event'=>request('cost_event'),
        'Public_event'=>request('public_event'),//public
        'Id_user'=>session()->get('Id_user'),// Utilisateur session en cour
        'Id_state'=>$Status[0]->Id_state,//Evenement jointure
        'Id_user_suggest'=>session()->get('Id_user'),// Utilisateur session en cour


    ]);


        }
        return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    
    }
    

    public function Suggest(){
        //TODO Session a verifier status = Etudiant
        if(session()->get('Status_user')){

            $Idee = DB::table('state')
            ->select('Id_state')
            ->where('State', 'Idée')
            ->get();//on recupere l'id correspondant a Idee

        request()->validate([
            'name_event'=>['required','unique:events,Name_event'],
            'description_event'=>['required'],
            ]);

        Events::create([
        'Name_event'=>request('name_event'),
        'Description_event'=>request('description_event'),
        'Public_event'=>1,
        'Id_state'=>$Idee[0]->Id_state,
        'Id_user_suggest'=>session()->get('Id_user'),// Session utilisateur en cour
        ]); 
         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être connecté pour faire cette action'
            ]);
        }

    
    public function Upgrade(){
        //TO DO Session a verifier status=BDE


        if(session()->get('Status_user')=='BDE'){



            $Prochainement = DB::table('state')
            ->select('Id_state')
            ->where('State', 'Prochainement')
            ->get();//on recupere l'id correspondant a Idee

        request()->validate([
            'date_event'=>['required'],
            'recurent_event'=>['required'], 
            'cost_event'=>['required'],
            //'id_image'=>['required'], 
            ]);
        
        DB::table('Events')
            ->where('Id_event', request('id_event'))
            ->update([
                'Name_event' => request('name_event'),
                'Date_event' => request('date_event'),
                'Description_event' => request('description_event'),
                'Recurent_event' => request('recurent_event'),
                'Cost_event' => request('cost_event'),
                'Id_user' => session()->get('id_user'),//Session utilisateur en cour
                'Id_state'=>$Prochainement[0]->Id_state,//evenement
                //'Id_image'=>request('id_image'),
                ]);

                $Idea=DB::table('events')//on recupereles données de l'idee qui est upgrade
                ->select('*')
                ->where('events.Id_event', request('id_event') )
                ->get();


                
                $Suggester = DB::table('users')//on retrouve la personne qui a suggest l'idee
                ->join('events', 'users.Id_user', '=', 'events.Id_user')
                ->select('Email_user')
                ->where('users.Id_user', $Idea[0]->Id_user_suggest)
                ->get();


                Mail::to($Suggester[0]->Email_user)->send(new IdeeRetenue);

                return redirect("/home");

         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    }   

    public function Notify_event(){
        //TO DO Session verifier status = Tuteur
        if(session()->get('Status_user')=='Tuteur'){

            request()->validate(['id_event'=>['required']]);

        DB::table('Events')
            ->where('Id_event', request('id_event'))
            ->update([
                'Id_user_approve'=>session()->get('Id_user'),//Session utilisateur 
                'Date_Approbation'=>date('Y/m/d'),
                'Public_event'=>0,//rend non public
        ]);

       $Event= DB::table('Events')
            ->select('*')
            ->where('Id_event', request('id_event'))
            ->get();




        $BDE = DB::table('users')
            ->join('status', 'users.Id_status', '=', 'status.Id_status')
            ->select('Email_user')
            ->where('status.Status', 'BDE')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $tuteur_name=session()->get('Name_user');
            $tuteur_surname=session()->get('Surname_user');
            $type='Evenement';
            $Name_event=$Event[0]->Name_event;//a changer par request(name_event)
    
            Mail::to($Member)->send(new Notification($tuteur_name, $tuteur_surname, $type, $Name_event));


        }


            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Vous devez être tuteur pour faire cette action'
                ]);
    }

    public function MAJ_event(){

        if(session()->get('Status_user')=='BDE'){



        $Events = DB::table('events')
        ->select('*')
        ->where('events.Date_event','<' , date('Y/m/d'))
        ->get();



        $Passé = DB::table('state')
        ->select('Id_state')
        ->where('state.State', 'Passé')
        ->get();



        foreach($Events as $Event){
        DB::table('Events')
            ->where('Id_event', $Event->Id_event)
            ->update([
                'Id_state'=>$Passé[0]->Id_state,//evenement
                //'Id_image'=>request('id_image'),
                ]);
        }

        return back();
    }

    return redirect('/connexion')->withErrors([
        'email_user' => 'Vous devez être tuteur pour faire cette action'
        ]);
}


}
