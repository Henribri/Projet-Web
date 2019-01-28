<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_product;
use App\_select;

class list_product_controller extends Controller
{
    public function display_product()
    {
        $products = \App\_product::all();
    
        return view('shop', [
            'products' => $products
        ]);
    }

    public function display_product_bis()
    {
        $products = \App\_product::all();
    
        return view('shop2', [
            'products' => $products
        ]);
    }

    public function Add_product()
    {
        request()->validate([
            'quantity'=>['required'],
        ]);

        //ORM
        $select= _select::create([
        'Id_product'=>"3",
        'Id_order'=>"1",
        'Quantity'=>request('quantity')]);
        return redirect('/shop2');
    }
}

