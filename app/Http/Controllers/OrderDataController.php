<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDataController extends Controller
{
    public function ShowDataOrder(Request $request)
    {
       // dd($request->all());
        $request->orders_id;
        $order_details =  DB::select('select * from order_detail_controllers where orber_id = '.$request->orders_id.'');
        $products = DB::select('select * from products');

        return view('order.order_detail',compact(['order_details','products']));

    }
}
