<?php

namespace App\Http\Controllers;

use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; //เอานี้มาใส่ด้วย
use Illuminate\Support\Facades\File; //เอานี้มาใส่ด้วย

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            //dd($request->all());
            $order_id = $request->order_id; 
        
            $cover = $request->file('slipfile');
            $extension = $cover->getClientOriginalExtension();
            $name_pic  = $cover->getFilename().'.'.$extension;
            Storage::disk('slip')->put($cover->getFilename().'.'.$extension,  File::get($cover));

            $transfer = Transfer::create([
                'order_id' => $order_id,
                'transfers_pic' => $name_pic
            ]);

            $affected = DB::table('order_list_controllers')->where('id', $order_id)->update(['orber_status' => 2]);
            
            return redirect('/order');
            //order_list_controllers
            //dd($cover);
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        return "asdasd";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    public function forminsert(Request $request)
    {
        //dd($request->all());
        $order_id = $request->order_id; 

        return view('transfer.transfer_form')->with('order_id',$order_id);;

    }

    public function insertslip(Request $request){
    
        
       
    }

    public function showslip(Request $request)
    {
        dd($request);
        return "";
    }
}
