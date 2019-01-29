<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_product;
use Illuminate\Support\Facades\DB;

class create_product_controller extends Controller
{
    //Ici on affiche juste la page de création de produit
    public function Create_product_page(){

        $products = \App\_product::all();
    
        return view('add_product', [
            'products' => $products
        ]);
    }

    //Ici on gère la création d'un produit
    public function Create_product(){

    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_product'=>['required'],
        'description_product'=>['required'],
        'price_product'=>['required'],
        'id_category'=>['required'],
        ]);

        //ORM
    $products= \App\_product::create([
        'Name_product'=>request('name_product'),
        'Description_product'=>request('description_product'),
        'Price_product'=>request('price_product'),
        'Id_category'=>request('id_category'),
        'Id_image'=>'1',
    ]);

    return "Produit créer";
    }
}