<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sign_in;
use App\Users;

class Event_user extends Controller
{
    //


    public function Sign_in(){


            $all_users=Users::all();
            $user_id=0;

            foreach($all_users as $user){
               
               if( $user->Email_user == request('email_user')){
                 
                    $user_id= $user->Id_user;
                    
               }

            }

            

            
            request()->validate([
                'num_event'=>['required'],
                'email_user'=>['required'],
                'localisation_user'=>['required'],

                ]);

                //on verifie qur l'utilisateur ne soit pas déjà inscrit
                $all_sign_in=Sign_in::all();
                foreach($all_sign_in as $sign_in){
               
                    if( $sign_in->Id_user == $user_id){
                        return "vous etes deja inscrit à l'évènement";
                    }
     
                 }




            $user_sign_in= Sign_in::create([
                    'Id_user'=>$user_id,
                    'Id_event'=> request('num_event'),
                ]);

                return "vous etes inscrit a l'event";
        


    }

}

