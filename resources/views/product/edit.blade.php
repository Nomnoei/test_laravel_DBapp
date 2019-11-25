@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <hr>
    <form action="{{url('product',[$product->id])}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-grop">
                <label for="title">Title</label>
        <input type="text" class="form-control" name="product_tite" value="{{$product->product_tite}}">
            </div>
        
            <div class="form-grop">
                <label for="data">Data</label>
                <input type="text" class="form-control" name="product_data" value="{{$product->product_data}}">
            </div>
        
            <div class="form-grop">
                <label for="npice">NPice</label>
                <input type="text" class="form-control" name="product_npice" value="{{$product->product_npice}}">
            </div>
        
            <div class="form-grop">
                <label for="spice">SPice</label>
                <input type="text" class="form-control" name="product_spice" value="{{$product->product_spice}}">
            </div>
        
            <div class="form-grop">
                <label for="code">Code</label>
                <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}">
            </div>
        

            <div class="form-group">
                    <label for="pic">pic:</label>
                    <input type="file" class="form-control" name="product_pic" value="{{$product->product_pic}}">
                </div>
        

        
            <div class="form-grop">
                <label for="ship">ship</label>
                <input type="text" class="form-control" name="product_ship" value="{{$product->product_ship}}">
            </div>



            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
    
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    </div>
@endsection