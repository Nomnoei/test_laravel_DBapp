<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        session_start();
        $products = DB::select('select * from products where id = :id', ['id' => $id]);
        //session(['name' => $member->name]);
        //session(['type' => $member->type]);
       
        if(empty($_SESSION['id'])or !in_array($id,$_SESSION['id'])){
            foreach($products as $product){
                //session(['id' => $product->id]);
                //session(['name' => $product->product_tite]);
                //session(['pice' => $product->product_npice]);

                $_SESSION['id'][] = $product->id;
                $_SESSION['title'][] = $product->product_tite;
                $_SESSION['pice'][] = $product->product_npice;
                $_SESSION['amount'][]=1;
        }
        //return session('id')." ".session('name')." ".session('pice');
       
       
    }
    //return session_destroy();
    return view('addtocart.index');
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
