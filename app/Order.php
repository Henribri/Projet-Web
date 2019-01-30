<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = false;
    protected $table="_order";
    protected $fillable=['Id_order','Id_user','Date_order','Validate'];

}
