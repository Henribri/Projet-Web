<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Users extends Model implements Authenticatable{

    use BasicAuthenticatable;

    //pb de bdd sans ca (on enleve les Create at etc...)
    public $timestamps = false;
    protected $table="_user";
    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Name_user','Surname_user','Localisation_user','Email_user','Password_user','Id_status'];
    protected $primaryKey='Id_user';

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password_user;
    }




}