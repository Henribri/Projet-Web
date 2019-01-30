<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Select;
use App\Users;
class PannierCtrl extends Controller
{
    //

    //--VIEW CART
    public function View_pannier(){

        //--CONNEXION CHECK
        if(session()->get('Status_user')){
            //--SELECT ORDER OF THE CONNECT USER
        $Orders=Order::
        join('_select', '_order.Id_order', '=', '_select.Id_order')
        ->join('_product', '_select.Id_product','=', '_product.Id_product')
        ->where([['_order.Id_user', session()->get('Id_user')],
                ['_order.Validate', 0]])
        ->get();

        return view('pannier',[
            'Orders'=>$Orders,
        ]);

        }  

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

    }


    //--FUNCTION TO ADD PRODUCT TO CART
    public function Add_product()
    {
        //--CONNEXION CHECK
        if(session()->get('Status_user'))
        {
            //--FIND ID OF THE PRODUCT CHOOSE
            $Id_product = Produit::
            select('_product.Id_product')
            ->where('_product.Name_product', request('name_product'))
            ->first();


            //--TRY TO FIND AN EXISTING ORDER OF THE USER
            $user = session()->get('Id_user');      
            $order = Order::
            join('_user', '_order.Id_user', '=', '_user.Id_user')
            ->select('_order.Id_order')
            ->where([
                ['_order.Id_user', $user],
                ['Validate', '0'],
            ])
            ->first();

            //--IF AN ORDER DOESNT EXIST CREATE AN ORDER
            if(isset($order))
            {
                request()->validate([
                    'quantity'=>['required'],
                ]);
    
                DB::transaction(function () use($Id_product) {
                Select::create([
                    'Id_product'=>$Id_product->Id_product,
                    'Id_order'=>$order->Id_order,
                    'Quantity'=>request('quantity')]);
                    return redirect('/pannier');
                });
            }

            //--ELSE USE AN EXISTING ORDER
            else
            {
                $date = date("Y/m/d");

                $order=Order::create([
                    'Date_order'=>$date,
                    'Validate'=>"0",
                    'Id_user'=>$user]);
                

                request()->validate([
                    'quantity'=>['required'],
                ]);
        
                /*
                $order=Order::
                join('_user', '_order.Id_user', '=', '_user.Id_user')
                ->select('_order.Id_order')
                ->where([
                    ['_order.Id_user', $user],
                    ['Validate', '0'],
                ])
                ->first();
        */

                //--CREATE A NEW SELECT WITH ORDER PRODUCT AND QUANTITY

                DB::transaction(function () use($Id_product, $order) {
                Select::create([
                    'Id_product'=>$Id_product->Id_product,
                    'Id_order'=>$order->Id_order,
                    'Quantity'=>request('quantity')]);
                    return redirect('/pannier');
                });
            }

            //--SEND MAIL TO BDE

            $BDE = Users::
            join('_status', '_user.Id_status', '=', '_status.Id_status')
            ->select('Email_user')
            ->where('_status.Status', 'BDE')
            ->get();

            //
        for($i=0; $i<count($BDE); $i++){
            
            $Member=$BDE[$i]->Email_user;
            $user_name=session()->get('Name_user');
            $user_surname=session()->get('Surname_user');
            
                
            Mail::to($Member)->send(new Notification($user_name, $user_surname));


        }

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);
    }

}

//--FUNCTION TO DELETE A PRODUCT OF THE CART
public function Delete_product_pannier()
{
    //--CHECK CONNEXION
    if(session()->get('Status_user'))
    {
        $user = session()->get('Id_user');
        $id_product = request("id_product");
        
        DB::transaction(function () use($user, $id_product) {
        Select::join('_order', '_select.Id_order', '=', '_order.Id_order')
            ->where([
            ['_order.Id_user', $user],
            ['_select.Id_product',$id_product],])
            ->delete('*');
        });
        return "Votre article à bien été supprimé";
    }
    return redirect('/connexion')->withErrors([
        'email_user' => 'Veuillez vous authentifier'
        ]);
}


}
