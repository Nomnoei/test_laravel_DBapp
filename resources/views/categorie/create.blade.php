@extends('layout.mainlayout')

@section('content')
<h1 class="mt-5 pt-5">Add Categorie</h1>
<hr>
<div class="container">
    <form action="/categorie" method="post">
        {{ csrf_field() }}
        <div class="form-grop">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="cate_title">
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
    
</div>
@endsection