<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ImageShowController extends Controller
{
    public function showimage($id)
    {
        $transfers = DB::select('select * from transfers where order_id = '.$id);
        return view('manage.show_image',compact('transfers'));
    }

    public function Confimslip($id){

        DB::table('order_list_controllers')
              ->where('id', $id)
              ->update(['orber_status' => 1]);

              $orders_list = DB::select('select * from order_list_controllers');
              $users =  DB::select('select * from users');
              $transfers = DB::select('select * from transfers');
              return view('manage.manage_order',compact(['orders_list','users','transfers']));
    }

    public function closeslip($id){
        DB::table('order_list_controllers')
        ->where('id', $id)
        ->update(['orber_status' => 3]);

        $orders_list = DB::select('select * from order_list_controllers');
        $users =  DB::select('select * from users');
        $transfers = DB::select('select * from transfers');
        return view('manage.manage_order',compact(['orders_list','users','transfers']));
    }
}
