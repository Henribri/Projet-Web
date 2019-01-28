<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class list_product_controller extends Controller
{
    public function display_product()
    {
        $product = \App\product::all();
    
        return view('Magasin', [
            'product' => $product
        ]);
    }
}
