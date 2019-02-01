<?php

namespace App\Http\Controllers;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Image;
use App\Sign_in;
use App\Events;
use App\State;
use App\Status;
use App\Comments;
use App\Photos;
use App\Likes;
use App\Vote;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use App\Mail\IdeeRetenue;
use Illuminate\Support\Facades\DB;

class Create_eventCtrl extends Controller
{


    //--VIEW TO CREATE IDEA

    public function View_create_idea(){
        
        if(session()->get('Status_user')){
            return view('create_idea');
        }


        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }



    
    //--VIEW TO CREATE EVENT
    public function View_create_event(){
        

        //--CHECK CONNEXION

        if(session()->get('Status_user')=='BDE'){

            //--CHECK IF AN IDEA IS USE TO CREATE AN EVENT
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


    //--FUNCTION CREATE EVENT
    public function Create_event(request $request){

        //--CHECK IF THE USER IS BDE
        if(session()->get('Status_user')=='BDE'){

            request()->validate([
                'name_event'=>['required','unique:_event,Name_event'],
                'description_event'=>['required'],
                'date_event'=>['required'],
                'recurent_event'=>['required'], 
                'public_event'=>['required'], 
                'cost_event'=>['required'],
                'image_event'=>['required'],
                ]);





                //CREATE IMAGE

        $extension=$request->image_event->extension();
        
                //CHECK EXTENSION
        if($extension!='png'&&$extension!='jpg'&&$extension!='jpeg'){

            return back()->withErrors([
                'image_event' => 'Mauvais format'
                ]);;
        }

        $imagetraitement=$request->file('image_event');
        $input['imagename']= time().'.'.$extension;
        $path=public_path('Images');
        $imagetraitement->move($path, $input['imagename']);

        $pathimage='/Images'.'/'.$input['imagename'];

        $Image= Image::create([
                'Image'=>$pathimage
                ]);

            //--FIND ID STATUS OF MONTH
          $Status = State::select('Id_state')
            ->where('State', 'Month')
            ->first();

            //--CREATE EVENT
        DB::transaction(function () use($Status, $Image) {
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
        'Id_image'=>$Image->Id_image,

    ]);
        });
        return redirect('/events_month');
        }
        return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    
    }
    

    public function Suggest(){
        //--CHECK CONNEXION
        if(session()->get('Status_user')){

            //--FIND ID OF IDEA STATE
            $Idee = State::select('Id_state')
            ->where('State', 'Idea')
            ->first();

        request()->validate([
            'name_event'=>['required','unique:_event,Name_event'],
            'description_event'=>['required'],
            ]);

            //--CREATE AN IDEA

            DB::transaction(function ()  use($Idee) {
                Events::create([
                'Name_event'=>request('name_event'),
                'Description_event'=>request('description_event'),
                'Public_event'=>1,
                'Id_state'=>$Idee->Id_state,
                'Id_user_suggest'=>session()->get('Id_user'),
                ]); 
                });

                return redirect('/events_idea');
         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être connecté pour faire cette action'
            ]);
        }


        //--FUNCTION TO UPGRADE AN IDEA TO EVENT
    
    public function Upgrade(request $request){

            //--CHECK CONNEXION
        if(session()->get('Status_user')=='BDE'){

            $Prochainement = State::select('Id_state')
            ->where('State', 'Month')
            ->first();


        request()->validate([
            'name_event'=>['required'],
            'description_event'=>['required'],
            'date_event'=>['required'],
            'recurent_event'=>['required'], 
            'public_event'=>['required'], 
            'cost_event'=>['required'],
            'image_event'=>['required'],
            
            ]);


            //--CREATE IMAGE

        $extension=$request->image_event->extension();

        if($extension!='png'&&$extension!='jpg'&&$extension!='jpeg'){

            return back()->withErrors([
                'image_event' => 'Mauvais format'
                ]);;
        }

        $imagetraitement=$request->file('image_event');
        $input['imagename']= time().'.'.$extension;
        $path=public_path('Images');
        $imagetraitement->move($path, $input['imagename']);

        $pathimage='/Images'.'/'.$input['imagename'];
        
       $Image= Image::create([
            'Image'=>$pathimage
        ]);

        //--UPDATE IDEA TO EVENT
        
        DB::transaction(function () use($Prochainement, $Image) {
        Events::where('Id_event', request('id_event'))
            ->update([
                'Name_event' => request('name_event'),
                'Date_event' => request('date_event'),
                'Description_event' => request('description_event'),
                'Recurent_event' => request('recurent_event'),
                'Cost_event' => request('cost_event'),
                'Id_user_create' => session()->get('id_user'),
                'Id_state'=>$Prochainement->Id_state,
                'Id_image'=>$Image->Id_image,
                ]);
            });


            //--SEND MAIL TO THE IDEA CREATER

                $Idea=Events::where('Id_event', request('id_event') )
                ->first();
    
                $Suggester = Users:://on retrouve la personne qui a suggest l'idee
                join('_event', '_user.Id_user', '=', '_event.Id_user_suggest')
                ->select('Email_user')
                ->where('_user.Id_user', $Idea->Id_user_suggest)
                ->first();


                Mail::to($Suggester->Email_user)->send(new IdeeRetenue);

                return redirect('/events_month');

         }
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être membre du BDE pour faire cette action'
            ]);
    }   


    //--FUNCTION TO NOTIFY BDE

    public function Notify_event(){
        //--CHECK CONNEXION
        if(session()->get('Status_user')=='Tuteur'){

            request()->validate(['id_event'=>['required']]);

            //--MAKE INVISIBLE THE EVENT
            DB::transaction(function () {
                Events::where('Id_event', request('id_event'))
                ->update([
                    'Id_user_approve'=>session()->get('Id_user'),
                    'Date_Approbation_events'=>date('Y/m/d'),
                    'Public_event'=>0,
                ]);
            });


        //--FIND THE EVENT UPDATE ->> PROBLEMS CAUSE BY TRANSACTION

       $Event= Events::
            where('Id_event', request('id_event'))
            ->first();


            //--SEND MAIL TO BDE
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



    //--CHANGE THE STATE OF EVENTS

    public function MAJ_event(){


        //--CHECK CONNEXION
        if(session()->get('Status_user')=='BDE'){

            //--FIND EVENTS WITH PAST DATE
        $Events = Events::
        where('Date_event','<' , date('Y/m/d'))
        ->get();

            //--FIND ID OF PAST
        $Past = State::
        select('Id_state')
        ->where('State', 'Past')
        ->first();


            //--UPDATE STATE OF EACH EVENTS
        foreach($Events as $Event){

        DB::transaction(function () use($Past, $Event) {
        Events::
            where('Id_event', $Event->Id_event)
            ->update([
                'Id_state'=>$Past->Id_state,//evenement

                ]);
            });
        }

        return back();
    }

    return redirect('/connexion')->withErrors([
        'email_user' => 'Vous devez être membre du BDE pour faire cette action'
        ]);
}


    //--FUNCTION TO DELETE AN EVENT PAST
public function Delete_past(){

    if(session()->get('Status_user')=='BDE'){
    
        //--DELETE COMMENTS

        DB::transaction(function ()  {
            Comments::
            join('_photo', '_photo.Id_photo', '=', '_comment.Id_photo')
            ->join('_event', '_photo.Id_event', '=', '_event.Id_event')
                ->where('_event.Id_event', request('id_event'))
                ->delete('_comment.*');
                });


        //--THEN DELETE LIKES

        DB::transaction(function ()  {
            Likes::
            join('_photo', '_photo.Id_photo', '=', '_like.Id_photo')
            ->join('_event', '_photo.Id_event', '=', '_event.Id_event')
                ->where('_event.Id_event', request('id_event'))
                ->delete('_like.*');
                });

        DB::transaction(function ()  {
            Sign_in::
                join('_event', '_sign_in.Id_event', '=', '_event.Id_event')
                ->where('_event.Id_event', request('id_event'))
                ->delete('_sign_in.*');
                });

        DB::transaction(function ()  {
            Vote::
                join('_event', '_vote.Id_event', '=', '_event.Id_event')
                ->where('_event.Id_event', request('id_event'))
                ->delete('_vote.*');
                });

        //--THEN DELETE PHOTOS
        DB::transaction(function () {
            Photos::
            join('_event', '_photo.Id_event', '=', '_event.Id_event')
                ->where('_photo.Id_event', request('id_event'))
                ->delete('_photo.*');
                });

            //--THEN DELETE EVENTS
            DB::transaction(function () {
                Events::
                    where('Id_event', request('id_event'))
                    ->delete('_event.*');
                    });


            return back();
    }
    
    return redirect('/connexion')->withErrors([
        'email_user' => 'Vous devez être tuteur pour faire cette action'
        ]);
}




}
