<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_order' , 'Date_order' , 'Validate' , 'Id_user'];
}
