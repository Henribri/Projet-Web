<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_photo' , 'Public_photo' , 'Date_approbation_photos' , 'Id_event' , 'Id_image' , 'Id_user'];
}
