<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_categorie';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_category' , 'Category'];
}
