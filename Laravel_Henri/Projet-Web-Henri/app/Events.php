<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    public $timestamps = false;

    protected $table = '_statue';

    protected $fillable=['Name_event','Description_event','Date_event','Recurent_event','Cost_event','Public_event','Date_Approbation','Id_user','Id_state','Id_user_suggest','Id_image','Id_user_approve'];
}
