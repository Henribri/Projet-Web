<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class add_product_controller extends Controller
{
    //
    public function Add_product()
    {
        //TODO Session a verifier status = Etudiant
        if(session()->get('Status_user')){

        $user_order = DB::table('_order')
            ->select('Id_user')
            ->get();

        return dd($user_order);






        /*request()->validate([
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
         }*/
         return redirect('/connexion')->withErrors([
            'email_user' => 'Vous devez être connecté pour faire cette action'
            ]);
    }
}
}
