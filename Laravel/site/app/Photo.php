<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    protected $table = '_photo';

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_photo' , 'Public_photo' , 'Date_approbation_photos' , 'Id_event' , 'Id_image' , 'Id_user'];
}
