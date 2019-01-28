<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    public $timestamps = false;
    protected $table="Sign_in";
    protected $fillable=['Public_photo','Date_Approbation', 'Id_event', 'Id_image', 'Id_user'];
}

