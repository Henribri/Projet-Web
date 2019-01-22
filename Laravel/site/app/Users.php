<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Name_user','Surname_user','Localisation_user','Email_user','Password_user','Id_status'];
}