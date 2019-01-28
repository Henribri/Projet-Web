<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_product;
use Illuminate\Support\Facades\DB;

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
   //     'Id_category'=>['required'],
        ]);

    /*    $list_categories = DB::table('_product')
            ->join('_categorie', '_product.Id_category', '=', '_categorie.Id_category')
            ->select('Category')
            ->get();

        return dd($list_categories);
    */
        //ORM
    $product= \App\_product::create([
        'Name_product'=>request('name_product'),
        'Description_product'=>request('description_product'),
        'Price_product'=>request('price_product'),
        'Id_category'=>'1',
        'Id_image'=>'1',
    ]);


    return "Produit créer";
    }
}