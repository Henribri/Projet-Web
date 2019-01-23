<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Users extends Model implements Authenticatable{

    use BasicAuthenticatable;

    //pb de bdd sans ca
    public $timestamps = false;

    //les colonnes qu'on va remplir avec laravel
    protected $fillable=['Name_user','Surname_user','Localisation_user','Email_user','Password_user','Id_status'];

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