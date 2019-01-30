<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Status;

class ConnexionCtrl extends Controller
{
    
    //--RETURN VIEW TO LOG IN

    public function Formulaire(){

        if(!session()->get('Status_user')){
            
        return view('login');
      
    }

        //--RETURN AN ERROR

        return back()->withErrors([
            'email_user' => 'Vous devez être déconnecté pour pouvoir vous inscrire'
            ]);
    }

    //--FUNCTION LOG IN
    
    public function Log_in(){


        request()->validate([
        'email_user'=>['required','email'], 
        'password_user'=>['required'],
        ]);

    //-- USE AUTH() FOR THE CONNEXION THEN REGISTER WITH SESSION ->> PROBLEMS    

    auth()->attempt([

        'Email_user'=>request('email_user'),
        'password'=>request('password_user'),
        ]);


    if(auth()->check()){

        $user=auth::user();

        //--FIND THE ID OF ETUDIANT

        $status_user = Users::join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Status')
            ->where('_user.Id_user', $user->Id_user)
            ->first();


        //--MAKE SESSION

        session()->put('Status_user', $status_user->Status);
        session()->put('Id_user', $user->Id_user);
        session()->put('Email_user', $user->Email_user);
        session()->put('Name_user', $user->Name_user);
        session()->put('Surname_user', $user->Surname_user);
        return redirect('/home');
        
    }

    return back()->withInput()->withErrors([
        'email_user' => 'Vos identifiants sont incorrectes',
    ]);
        

        }

        //--VIEW TO CHANGE STATUS

        public function View_change_status(){
            if(session()->get('Status_user')=='BDE'){

                return view('administration');

            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Veuillez vous authentifier en tant que BDE'
                ]);
        }



        //--FUNCTION TO CHANGE STATUS

        public function Change_status(){

            if(session()->get('Status_user')=='BDE'){
                    
                request()->validate([
                    'email_user'=>['required','email'],
                    'user_status'=>['required'],
                    ]);


                $Status = Status::
                select('_status.Id_status')
                ->where('_status.Status', request('user_status'))
                ->first();


                //--UPDATE OF THE STATUS

                DB::transaction(function () use($Status) {
                Users::where('Email_user', request('email_user'))
                ->update([
                    'Id_status' => $Status->Id_status,//Session utilisateur en cour

                    ]);
                });

                
            return back()->withErrors([
                'email_user' => 'Status bien changé'
                ]);

            }
            return redirect('/connexion')->withErrors([
                'email_user' => 'Veuillez vous authentifier'
                ]);

        }
        
        //--VIEW LEGAL NOTICE
        public function View_legal_notice(){

            return view('legal_notice');
        }


}
