<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class Create_idea_controller extends Controller
{
    //

    //Ici on affiche juste la page de création d'idée
    public function Create_idea_page(){

        return view('Create_idea');
    }

    //Ici on gère la création d'une idée
    public function Create_idea(){

    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_event'=>['required'],
        'description_event'=>['required'],
        ]);

        //ORM
    $event= Event::create([
        'Name_event'=>request('name_event'),
        'Description_event'=>request('description_event'),
        'Public_event'=>'1',
        'Id_user'=>'6',
        'Id_state'=>'1',
        'Id_user_users'=>'6',
        'Id_image'=>'1',
    ]);


    return "Idée créer";
}
}
