<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Connexion_controller extends Controller
{
    public function accueil()
    {
        var_dump(auth()->guest());
        if(auth()->guest())
        {
            return redirect('/connexion')->withErrors(['email' => "Vous devez être connecté pour voir cette page"]);
        }

        return view("mon-compte");
    }
}
