<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search_product(Request $request){
        $output ="";
        $id = $request->id;
        //return $request->id;
        if($request->id != ''){
            $products = DB::table('products')->where('product_tite','like','%'.$id.'%')
            ->orwhere('product_data','like','%'.$id.'%')
            ->orwhere('product_npice','like','%'.$id.'%')
            ->get();
            //dd($$products);
        }else{
            $products = DB::table('products')->get();
            //dd($$products);
           
        }
        $total_row = $products->count();
        if($total_row > 0){
            foreach ($products as $product) {
                $output .=' 
                  <tr>
                  <th scope="row">'.$product->id.'</th>
                  <td>
                  <a href="/select/'.$product->id.'">'.$product->product_tite.'</a>
                  </td>
                  <td>'.$product->product_data.'</td>
                  <td>'.$product->product_npice.'</td>
                 </tr>';
                      
                  
              }
        }else{
            $output .='<tr><td>ไม่พบข้อมูล</td></tr>';
        }
        return $output;
        
       
    }
}
