<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_state' , 'State'];
}
