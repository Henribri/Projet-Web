<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use App\Events;
use App\State;
use App\Status;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App\Mail\IdeeRetenue;
use Illuminate\Support\Facades\DB;

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


            $Idea=false;
            if(request('id_event')){
                $Idea = Events::
                where('Id_event', request('id_event'))
                ->first();
            }


            return view('create_event',[
                'Idea'=>$Idea,
            ]);
        }


        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }


    //
    public function Create_event(){
        //TODO Session a verifier status = BDE
        if(session()->get('Status_user')=='BDE'){
            
    request()->validate([
        //on verifie le formulaire
        'name_event'=>['required','unique:_event,Name_event'],
        'description_event'=>['required'],
        'date_event'=>['required'],
        'recurent_event'=>['required'], 
        'public_event'=>['required'], 
        'cost_event'=>['required'],

        
        ]);

        //ORM      
        //on cherche l'id du status evenement
          $Status = State::select('Id_state')
            ->where('State', 'Month')
            ->first();

        DB::transaction(function () use($Status) {
        Events::create([
        'Name_event'=>request('name_event'),
        'Description_event'=>request('description_event'),
        'Date_event'=>request('date_event'),
        'Recurent_event'=>request('recurent_event'),
        'Cost_event'=>request('cost_event'),
        'Public_event'=>request('public_event'),//public
        'Id_user_create'=>session()->get('Id_user'),// Utilisateur session en cour
        'Id_state'=>$Status->Id_state,//Evenement jointure
        'Id_user_suggest'=>session()->get('Id_user'),// Utilisateur session en cour


    ]);
        });

        }
        return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    
    }
    

    public function Suggest(){
        //TODO Session a verifier status = Etudiant
        if(session()->get('Status_user')){

            $Idee = State::select('Id_state')
            ->where('State', 'Idea')
            ->first();//on recupere l'id correspondant a Idee

        request()->validate([
            'name_event'=>['required','unique:_event,Name_event'],
            'description_event'=>['required'],
            ]);


            DB::transaction(function ()  use($Idee) {
                Events::create([
                'Name_event'=>request('name_event'),
                'Description_event'=>request('description_event'),
                'Public_event'=>1,
                'Id_state'=>$Idee->Id_state,
                'Id_user_suggest'=>session()->get('Id_user'),// Session utilisateur en cour
                ]); 
                });
         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être connecté pour faire cette action'
            ]);
        }

    
    public function Upgrade(){
        //TO DO Session a verifier status=BDE


        if(session()->get('Status_user')=='BDE'){



            $Prochainement = State::select('Id_state')
            ->where('State', 'Month')
            ->first();//on recupere l'id correspondant a Idee

        request()->validate([
            'date_event'=>['required'],
            'recurent_event'=>['required'], 
            'cost_event'=>['required'],
            //'id_image'=>['required'], 
            ]);
        
        DB::transaction(function () use($Prochainement) {
        Events::where('Id_event', request('id_event'))
            ->update([
                'Name_event' => request('name_event'),
                'Date_event' => request('date_event'),
                'Description_event' => request('description_event'),
                'Recurent_event' => request('recurent_event'),
                'Cost_event' => request('cost_event'),
                'Id_user_create' => session()->get('id_user'),//Session utilisateur en cour
                'Id_state'=>$Prochainement->Id_state,//evenement
                //'Id_image'=>request('id_image'),
                ]);
            });

                $Idea=Events::where('Id_event', request('id_event') )
                ->first();


                
                $Suggester = Users:://on retrouve la personne qui a suggest l'idee
                join('_event', '_user.Id_user', '=', '_event.Id_user_suggest')
                ->select('Email_user')
                ->where('_user.Id_user', $Idea->Id_user_suggest)
                ->first();


                Mail::to($Suggester->Email_user)->send(new IdeeRetenue);

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

            DB::transaction(function () {
                Events::where('Id_event', request('id_event'))
                ->update([
                    'Id_user_approve'=>session()->get('Id_user'),//Session utilisateur 
                    'Date_Approbation_events'=>date('Y/m/d'),
                    'Public_event'=>0,//rend non public
                ]);
            });

       $Event= Events::
            where('Id_event', request('id_event'))
            ->first();




        $BDE = Users::
            join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Email_user')
            ->where('_status.Status', 'BDE')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $tuteur_name=session()->get('Name_user');
            $tuteur_surname=session()->get('Surname_user');
            $type='Evenement';
            $Name_event=$Event->Name_event;//a changer par request(name_event)
    
            Mail::to($Member)->send(new Notification($tuteur_name, $tuteur_surname, $type, $Name_event));


        }


            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Vous devez être tuteur pour faire cette action'
                ]);
    }

    public function MAJ_event(){

        if(session()->get('Status_user')=='BDE'){



        $Events = Events::
        where('Date_event','<' , date('Y/m/d'))
        ->get();



        $Past = State::
        select('Id_state')
        ->where('State', 'Past')
        ->first();



        foreach($Events as $Event){

        DB::transaction(function () use($Past, $Event) {
        Events::
            where('Id_event', $Event->Id_event)
            ->update([
                'Id_state'=>$Past->Id_state,//evenement
                //'Id_image'=>request('id_image'),
                ]);
            });
        }

        return back();
    }

    return redirect('/connexion')->withErrors([
        'email_user' => 'Vous devez être tuteur pour faire cette action'
        ]);
}


}
