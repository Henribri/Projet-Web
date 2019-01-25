<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_like';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_photo' , 'Id_user'];
}
