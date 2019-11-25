@extends('layout.mainlayout')

@section('content')
    <div class="container">
        <h1 class="mt-5 pt-5">Show Product [{{$product->product_tite}}]</h1>
        <div class="jumbotron text-conter">
            
        <p>{{$product->product_pic}}</p>
        <p>
            <img src="{{url('uploads/'.$product->product_pic)}}" alt="{{$product->product_pic}}">
        </p>
        <p><strong>Data </strong>{{$product->product_data}}</p>
        <p><strong>pice</strong>{{$product->product_npice}}</p>
        <p><strong>spice</strong>{{$product->product_spice}}</p>


            @foreach ($categorie as $categories)
                @if($categories->id == $product->product_code)
                    <p><strong>Type</strong> {{$categories->cate_title}}</p>
                @endif
            @endforeach

        </div>
    </div>
@endsection