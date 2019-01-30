<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Select extends Model
{
    //
    public $timestamps = false;
    protected $table="_like";
    protected $fillable=['Id_product','Id_order','Quantity'];
}
