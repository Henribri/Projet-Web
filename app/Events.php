<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //
    public $timestamps = false;
    protected $table="_event";
    protected $fillable=['Name_event','Description_event','Date_event','Recurent_event','Cost_event','Public_event','Date_Approbation_events','Id_user_suggest','Id_state','Id_user_create','Id_image','Id_user_approve'];
    protected $primaryKey='Id_event';
}
