<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Select;
use App\Users;
use App\Mail\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class PannierCtrl extends Controller
{
    //

    //--VIEW CART
    public function View_pannier(){

        //--CONNEXION CHECK
        if(session()->get('Status_user')){
            //--SELECT ORDER OF THE CONNECT USER
        $Products=Order::
        join('_select', '_order.Id_order', '=', '_select.Id_order')
        ->join('_product', '_select.Id_product','=', '_product.Id_product')
        ->where([['_order.Id_user', session()->get('Id_user')],
                ['_order.Validate', 0]])
        ->get();


        return view('pannier',[
            'Orders'=>$Products,
        ]);

        }  

        return redirect('/connexion')->withErrors([
            'email_user' => 'Veuillez vous authentifier'
            ]);

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




        public function Validate_order(){





           $orders= Order::
            join('_select', '_order.Id_order', '=', '_select.Id_order')
            ->join('_product', '_select.Id_product','=', '_product.Id_product')
            ->where([['_order.Id_user', session()->get('Id_user')],['_order.Validate', 0]])
            ->select('*')
            ->get();




            DB::transaction(function (){
                Order::
                join('_select', '_order.Id_order', '=', '_select.Id_order')
                ->join('_product', '_select.Id_product','=', '_product.Id_product')
                ->where([['_order.Id_user', session()->get('Id_user')],['_order.Validate', 0]])
                ->update(['_order.Validate'=>1]);
                });


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

            

            Mail::to($Member)->send(new Product($user_name, $user_surname, $orders));

        }
        return back();



    }

}
