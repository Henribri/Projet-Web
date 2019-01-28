<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _product extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_product';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_product' , 'Name_product' , 'Description_product' , 'Price_product' , 'Id_category' , 'Id_image'];
}