<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditAmountController extends Controller
{
    public function AddAmount(Request $request){
        //return dd($request->all());
        session_start();
        $_SESSION['amount']=$request->amount;
        return view('addtocart.index');
    }
}
