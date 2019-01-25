<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class create_product_controller extends Controller
{
    //Ici on affiche juste la page de création de produit
    public function Create_product_page(){

        return view('Create_product');
    }

    //Ici on gère la création d'un produit
    public function Create_product(){

    //On demande a ce que ces champs soit remplies sous certaines conditions
    request()->validate([
        'name_product'=>['required'],
        'description_product'=>['required'],
        'price_product'=>['required'],
        ]);

        //ORM
    $product= \App\Product::create([
        'Name_product'=>request('name_product'),
        'Description_product'=>request('description_product'),
        'Price_product'=>request('price_product'),
        'Id_category'=>'1',
        'Id_image'=>'1',
    ]);


    return "Produit créer";
    }
}