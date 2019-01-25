<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_event';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_event' , 'Name_event' , 'Description_event' , 'Date_event' , 'Recurent_event' , 'Cost_event' , 'Public_event' , 'Date_approbation_events' , 'Id_user' , 'Id_state' , 'Id_user_users' , 'Id_image' , 'Id_user_users_approuver'];
}