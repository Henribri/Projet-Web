<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use App\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;

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
            return view('create_event');
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

        request()->validate([
            'name_event'=>['required','unique:users,name_event'],
            'date_event'=>['required'],
            'recurent_event'=>['required'], 
            'id_image'=>['required'], 
            ]);
        
        DB::table('Events')
            ->where('Name_event', request('name_event'))
            ->update([
                'Name_event' => request('new_name_event'),
                'Date_event' => request('date_event'),
                'Description_event' => request('description_event'),
                'Recurent_event' => request('recurent_event'),
                'Cost_event' => request('cost_event'),
                'Id_user' => session()->get('id_user'),//Session utilisateur en cour
                'Id_state'=>request('id_state'),//evenement
                'Id_image'=>request('id_image'),
                ]);
         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    }   

    public function Approve(){
        //TO DO Session verifier status = Tuteur
        if(session()->get('Status_user')=='Tuteur'){

            request()->validate(['name_event'=>['required']]);

        DB::table('Events')
            ->where('Name_event', request('name_event'))
            ->update([
                'Id_user_approve'=>session()->get('id_user'),//Session utilisateur 
                'Date_Approbation'=>request('date_Approbation'),
                'Public_event'=>2,//rend non public
        ]);



        $users=Users::all();

        $BDE = DB::table('users')
            ->join('status', 'users.Id_status', '=', 'status.Id_status')
            ->select('Email_user')
            ->where('status.Status', 'Tuteur')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $tuteur_name=session()->get('Name_user');
            $tuteur_surname=session()->get('Surname_user');
            $type='Evènement';
            $Name_event='Evenement';//a changer par request(name_event)
    
            Mail::to($Member)->send(new Notification($tuteur_name, $tuteur_surname, $type, $Name_event));


        }


            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Vous devez être tuteur pour faire cette action'
                ]);
    }


}
