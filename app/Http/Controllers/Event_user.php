<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;

use App\Events;
use App\Photos;
use App\Vote;
use Illuminate\Support\Facades\DB;
use App\State;
use Illuminate\Support\Facades\Auth;



class Event_user extends Controller
{
    //

    //--VIEW EVENTS MONTH

    public function View_events_month(){
                
        //--SELECT MONTH EVENTS
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

    //--VIEW EVENTS IDEA
    public function View_events_idea(){
        
            //--FIND ID OF IDEA
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

        //--VIEW PAST EVENTS

    public function View_events_past(){

        //--SELECT PAST EVENTS

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

        
        //--VIEW PRIVATE EVENTS

        public function View_events_private(){
            
            //--CHECK CONNEXION AS BDE

            if(session()->get('Status_user')=='BDE'){
        
                //--SELECT PRIVATE EVENTS

                $Events = Events::
                join('_state', '_event.Id_state', '=', '_state.Id_state')
                ->join('_image', '_image.Id_image','=', '_event.Id_image')
                ->where('Public_event', 0)
                ->get();
            
        
                return view('Events_private',[
                    'Events'=>$Events,
                ]);}
            
                return back();
        }


        //--FUNCTION TO SIGN IN

    public function Sign_in_event(){

        //--CHECK CONNEXION

            if(session()->get('Status_user')){
          

            //--COUNT PEOPLE SIGN IN
            $Inscrits=Sign_in::where('Id_event', request('id_event'))
            ->get();

            $nbInscrits=count($Inscrits);
          

            //--ADD TO THE SIGN IN TABLE
            try{ 
            DB::transaction(function () {
            Sign_in::create([
                'Id_user'=>session()->get('Id_user'),
                'Id_event'=> request('id_event'),
            ]);
            });

        }
        catch(\Illuminate\Database\QueryException $e){
                
            //--DISPLAY ERRORS OR INFOS
            return back()->withErrors([
                'info' => 'Vous êtes déjà inscrit. '. $nbInscrits .' Inscrits'
                ]);//renvoyer erreur dans la div info
            }

            return back()->withErrors([
                'info' => 'Vous êtes bien inscrit. '. $nbInscrits .' autres Inscrits'
                ]);//renvoyer erreur dans la div info

        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }

    //--FUNCTION VOTE
    public function Vote_event(){

            //--CHECK CONNEXION
            if(session()->get('Status_user')){
                try{
                    //--COUNT VOTE

                    $Votes=Vote::where('Id_event', request('id_event'))
                    ->get();

                    $nbVotes=count($Votes);

                    //--ADD TO VOTE TABLE

                    DB::transaction(function () {
                    Vote::create([

                        'Id_user'=>session()->get('Id_user'),
                        'Id_event'=> request('id_event'),

                    ]);
                    });


                }catch(\Illuminate\Database\QueryException $e){
                    
                    //--DISPLAY ERRORS OR INFOS
                return back()->withErrors([
                    'info' => 'Vous avez déjà voté. '. $nbVotes .' Votes'
                    ]);

        }
            return back()->withErrors([
                'info' => 'Vote bien pris en compte. '. $nbVotes .' autres Votes'
                ]);
            }
        


        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }



        //--DOWNLOAD EVENTS PHOTOS
    public function Download_photos_events(){

        //--CONNEXION CHECK
        if(session()->get('Status_user')=='Tuteur'){

            $photos = Photos::
                join('_image', '_image.Id_image','=','_photo.Id_image')
                ->where('Id_event', request('id_event'))
                ->get();



                if($photos==null){
                    $imgs_path = array();


                    foreach ($photos as $photo){

                        $path = '.' .$photo->Image;

                    array_push($imgs_path, $path);

                    }



                    //$files = glob('uploads/*');

                    $zip = \Zipper::make('images_event.zip')->add($imgs_path)->close();



                    $headers = [

                    'Content-Type' => 
                    'application/zip',

                    ];



                    return \Response::download('images_event.zip',
                    'filename.zip', $headers)->deleteFileAfterSend(true);
                }
                
                return back();

                        }


    }}

