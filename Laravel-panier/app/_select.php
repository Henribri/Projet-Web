<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _select extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_select';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_product' , 'Id_order' , 'Quantity'];
}
