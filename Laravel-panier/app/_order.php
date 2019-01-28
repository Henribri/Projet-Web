<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _order extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_order';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_order' , 'Date_order' , 'Validate' , 'Id_user'];
}
