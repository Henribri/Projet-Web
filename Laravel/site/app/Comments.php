<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Id_comment' , 'Comment_comment' , 'Public_comment' , 'Date_Approbation_comments' , 'Id_user' ,'Id_photo' , 'Id_user_users'];
}
