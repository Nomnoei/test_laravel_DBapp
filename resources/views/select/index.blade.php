@extends('layout.mainlayout')

@section('content')

<div class="container">
    <h3>รายชื่อสินค้า</h3>
    <hr>
    <table class='table mt-5'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Data</th>
                    <th scope="col">Product Pice</th>
                
                </tr>
        
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                <th scope="row">{{$product->id}}</th>
                <td>
                
                    <a href="/select/{{$product->id}}">{{$product->product_tite}}</a>
                  
                    
                
                </td>
                <td>{{$product->product_data}}</td>
                <td>{{$product->product_npice}}</td>
               
            </tr>
                    
                @endforeach
            </tbody>
        
        </table>
</div>

@endsection