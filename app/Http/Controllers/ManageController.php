<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $orders_list = DB::select('select * from order_list_controllers');
        $users =  DB::select('select * from users');
        return view('manage.manage_order',compact(['orders_list','users']));
    }

    public function show(Request $request){
        //dd($request->all());  
        $status = $request->status;
        $id_member = $request->member_id;
        $order_list_id = $request->order_list_id;
        $update = DB::table('order_list_controllers')
              ->where('id', $order_list_id)
              ->update(['orber_status' => $status]);
        $update;

        $orders_list = DB::select('select * from order_list_controllers');
        $users =  DB::select('select * from users');
        return view('manage.manage_order',compact(['orders_list','users']));

    }
}
