@extends('layout.mainlayout')

@section('content')

<h1 class="mt-5 pt-5">Add Product</h1>
<hr>

<div class="container">
    <form action="/product" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-grop">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="product_tite">
        </div>
    
        <div class="form-grop">
            <label for="data">Data</label>
            <input type="text" class="form-control" name="product_data">
        </div>
    
        <div class="form-grop">
            <label for="npice">NPice</label>
            <input type="text" class="form-control" name="product_npice">
        </div>
    
        <div class="form-grop">
            <label for="spice">SPice</label>
            <input type="text" class="form-control" name="product_spice">
        </div>
    
      
        <div class="form-group">
            <label for="code">Code</label>
            <select name="product_code" class="custom-select">
                @foreach ($categorie as $categories)
                    <option value="{{$categories->id}}">{{$categories->cate_title}}</option>
                @endforeach
                
            </select>
            <a href="{{URL::to('categorie')}}">จัดการหมวดหมู</a>
        </div>




        <div class="form-group">
                <label for="pic">pic</label>
                <input type="file" class="form-control" name="product_pic"/>
            </div>
    
            <input type="hidden" name="product_ship" value="1">
    
    
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