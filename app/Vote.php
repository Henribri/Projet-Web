<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public $timestamps = false;
    protected $table="_vote";
    protected $fillable=['Id_user','Id_event'];
}
