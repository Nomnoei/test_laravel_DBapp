<?php

namespace App\Http\Controllers;

use App\OrderDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select('select * from products');
        $orders_list = DB::select('select * from order_list_controllers');
        $orders = DB::select('select * from order_detail_controllers');
        return view('order.select_order',compact(['orders','orders_list','products']));
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
     * @param  \App\OrderDetailController  $orderDetailController
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetailController $orderDetailController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderDetailController  $orderDetailController
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetailController $orderDetailController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderDetailController  $orderDetailController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetailController $orderDetailController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderDetailController  $orderDetailController
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetailController $orderDetailController)
    {
        //
    }
}
