<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_vote';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_event' , 'Id_user'];
}
