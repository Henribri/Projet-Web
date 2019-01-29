<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    public $timestamps = false;
    protected $table="_comment";
    protected $fillable=['Comment_comment','Public_comment','Id_user','Id_photo','Id_user_approve','Date_Approbation_comments'];
    protected $primaryKey='Id_comment';
}
