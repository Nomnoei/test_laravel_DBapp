@extends('layout.mainlayout')

@section('content')

<div class="container">
    <hr>
        <table class='table mt-5'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Data</th>
                        <th scope="col">Product Pice</th>
                        <th scope="col">Action</th>
                    
                    </tr>
            
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><a href="/product/{{$product->id}}">{{$product->product_tite}}</a></td>
                    <td>{{$product->product_data}}</td>
                    <td>{{$product->product_npice}}</td>
                    <td>
                        <div class="btn-group" role="group">
                        <a href="{{URL::to('product/'.$product->id.'/edit')}}">
                            <button type="button" class="btn btn-warning mr-1">Edit</button>
                        </a>
            
                        <form action="{{url('product',[$product->id])}}" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                        
                        </div>
            
                    </td>
                </tr>
                        
                    @endforeach
                </tbody>
            
            </table>
</div>

@endsection