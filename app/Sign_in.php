<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign_in extends Model
{
    //
    //pb de bdd sans ca
    public $timestamps = false;
    protected $table="_sign_in";
    protected $fillable=['Id_user','Id_event'];
    protected $primaryKey=['Id_user','Id_event'];
}
