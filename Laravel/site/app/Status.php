<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_status' , 'Status'];
}