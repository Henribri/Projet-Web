<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //
    public $timestamps = false;
    protected $table="_photo";
    protected $fillable=['Public_photo','Date_Approbation_photos', 'Id_event', 'Id_image', 'Id_user','Id_user_approve'];
    protected $primaryKey='Id_photo';
}

