<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\_order;
use App\_select;

class test_controller extends Controller
{
    public function test_view()
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
                echo 'bonsoir';
            }
            else
            {
                echo 'bonjour';
            }
        

        
    }
}
