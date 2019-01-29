<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public $timestamps = false;
    protected $table="_image";
    protected $fillable=['Image'];
    protected $primaryKey='Id_image';

}
