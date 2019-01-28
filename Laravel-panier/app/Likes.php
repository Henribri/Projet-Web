<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
    public $timestamps = false;

    protected $fillable=['Id_photo','Id_user'];

}
