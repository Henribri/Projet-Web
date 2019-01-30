<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $table="_product";
    protected $fillable=['Id_product','Name_product','Description_product','Price_product','Id_category','Id_image'];
}
