<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ConfimOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        $count=count($_SESSION['id']);

        DB::table('order_list_controllers')->insert(
            ['orber_member' => Auth::user()->id,
            'orber_status' => '0']
        );

    $order_detail = DB::select('select MAX(id) as orber_id from order_list_controllers');
    foreach ($order_detail as $order_details) {
        //session(['num' => $order_details->orber_id]);
        $num = $order_details->orber_id;
      }
      if(empty($num)){
        $num = 1;
      }
      
        for($i=0;$i<$count;$i++){
           
            $product_id=$_SESSION['id'][$i];
            $product_amount=$_SESSION['amount'][$i];
            DB::table('order_detail_controllers')->insert(
                ['orber_id' => $num ,
                'product_id' => $product_id,
                'product_amout' => $product_amount]
            );
        }
        $products = DB::select('select * from products');
        $orders_list = DB::select('select * from order_list_controllers');
        $orders = DB::select('select * from order_detail_controllers');
        return view('order.select_order',compact(['orders','orders_list','products']));
        //dd($num);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
