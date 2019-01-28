<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statue extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_statue';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_statue' , 'Statue'];
}