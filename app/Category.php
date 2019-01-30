<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $timestamps = false;
    protected $table="_categorie";
    protected $fillable=['Id_category','Category'];
    protected $primaryKey='Id_category';
}
