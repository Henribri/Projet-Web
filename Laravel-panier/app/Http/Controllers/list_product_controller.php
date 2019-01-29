<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_product;
use App\_select;
use App\_order;
use Session;
use DB;

class list_product_controller extends Controller
{
    public function display_product()
    {
        $products = \App\_product::all();
    
        return view('add_product', [
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
        if(session()->get('Status_user'))
        {
            $user = session::get('Id_user');
       
            $order = DB::table('_order')
            ->join('_user', '_order.Id_user', '=', '_user.Id_user')
            ->select('_order.Id_order')
            ->where([
                ['_order.Id_user', $user],
                ['Validate', '0'],
            ])
            ->first();

            if(isset($order))
            {
                request()->validate([
                    'quantity'=>['required'],
                ]);
    
                //ORM
                $select= _select::create([
                    'Id_product'=>request('id_product'),
                    'Id_order'=>$order->Id_order,
                    'Quantity'=>request('quantity')]);
                    return redirect('/shop2');
            }

            else
            {
                $date = date("Y/m/d");

                $create_order= _order::create([
                    'Date_order'=>$date,
                    'Validate'=>"0",
                    'Id_user'=>$user]);
        
                request()->validate([
                    'quantity'=>['required'],
                ]);
        
                $order = DB::table('_order')
                ->join('_user', '_order.Id_user', '=', '_user.Id_user')
                ->select('_order.Id_order')
                ->where([
                    ['_order.Id_user', $user],
                    ['Validate', '0'],
                ])
                ->first();
        
                //ORM
                $select= _select::create([
                    'Id_product'=>"2",
                    'Id_order'=>$order->Id_order,
                    'Quantity'=>request('quantity')]);
                    return redirect('/shop2');
            }
        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);
    }

    public function list_pannier()
    {
        if(session()->get('Status_user'))
        {
            $user = session::get('Id_user');

            $orders = DB::table('_select')
            ->join('_order', '_select.Id_order', '=', '_order.Id_order')
            ->join('_product','_select.Id_product','=','_product.Id_product')
            ->select('_product.Name_product','_select.Quantity','_product.Price_product')
            ->where([
                ['_order.Id_user', $user],
                ['_order.Validate', '0'],
            ])
            ->get();

            return view('pannier', [
                'orders' => $orders
            ]);
        }
        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);
    }
}

