<?php

namespace App\Http\Controllers;

use App\categories;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //เอานี้มาใส่ด้วย
use Illuminate\Support\Facades\File; //เอานี้มาใส่ด้วย

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products',$products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categories::all();
        return view('product.create',compact('categorie',$categorie));
        //return dd($categorie);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

        $cover = $request->file('product_pic');
        $extension = $cover->getClientOriginalExtension();
        $name_pic  = $cover->getFilename().'.'.$extension;
       
        //dd($cover);
        //validate
        $request->validate([
            'product_tite'=>'required',
            'product_data'=>'required',
            'product_npice'=>'required',
            'product_spice'=>'required',
            'product_code'=>'required',
            'product_ship'=>'required'
        ]);
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        $product = Product::create([
            'product_tite'=>$request->product_tite,
            'product_data'=>$request->product_data,
            'product_npice'=>$request->product_npice,
            'product_spice'=>$request->product_spice,
            'product_code'=>$request->product_code,
            'product_pic'=>$name_pic,
            'product_ship'=>$request->product_ship
        ]);

        return redirect('/product/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        $categorie = Categories::all();
        //return view('product.show',compact('product',$product));
        return view('product.show',compact(['product','categorie'])); //การส่งหลายๆตัวแปร
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('product.edit',compact('product',$product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //validate
        
        $name_pic ="";

        $request->validate([
            'product_tite'=>'required',
            'product_data'=>'required',
            'product_npice'=>'required',
            'product_spice'=>'required',
            'product_code'=>'required',
            'product_ship'=>'required'
        ]);
        if($product->product_pic != $request->product_pic){
           
            Storage::disk('public')->delete($product->product_pic);

            $cover = $request->file('product_pic');
            $extension = $cover->getClientOriginalExtension();
            $name_pic  = $cover->getFilename().'.'.$extension;
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        }else{
            $name_pic = $product->product_pic;
        }


        $product->product_tite = $request->product_tite;
        $product->product_data = $request->product_data;
        $product->product_npice = $request->product_npice;
        $product->product_spice = $request->product_spice;
        $product->product_code = $request->product_code;
        $product->product_pic = $name_pic;
        $product->product_ship = $request->product_ship;
        
        $product->save();
        $request->session()->flash('message','Successfully modifind product'); 
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,product $product)
    {
        Storage::disk('public')->delete($product->product_pic);
        $product->delete();
        $request->session()->flash('message','Successfully Delete the product');
        return redirect('product');
    }
}
