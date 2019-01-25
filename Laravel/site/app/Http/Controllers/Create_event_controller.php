<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;

class Create_event_controller extends Controller
{
    //Ici on affiche juste la page de création d'événement
    public function Create_event_page(){

        return view('Create_event');
    }

        //Ici on gère la création d'un événements
    public function Create_event(){

    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_event'=>['required'],
        'description_event'=>['required'],
        'date_event'=>['required'],
        'recurent_event'=>['required'],
        'cost_event'=>['required'],
        ]);

        //ORM
    $event= Events::create([
        'Name_event'=>request('name_event'),
        'Description_event'=>request('description_event'),
        'Date_event'=>request('date_event'),
        'Recurent_event'=>'0',
        'Cost_event'=>request('cost_event'),
        'Public_event'=>'1',
        'Id_user'=>'6',
        'Id_state'=>'2',
        'Id_user_users'=>'6',
        'Id_image'=>'1',
    ]);


    return "Événement créer";
    }
}