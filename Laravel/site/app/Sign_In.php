<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign_in extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_event' , 'Id_user'];
}
