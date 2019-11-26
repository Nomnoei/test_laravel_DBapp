<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClearController extends Controller
{
    public function index()
    {
        session_start();
        session_destroy();
        return view('addtocart.index');
    }   
}
