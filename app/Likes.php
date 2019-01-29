<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
    public $timestamps = false;
    protected $table="_like";
    protected $fillable=['Id_photo','Id_user'];
    protected $primaryKey=['Id_photo','Id_user'];

}
