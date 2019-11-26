@extends('layout.mainlayout')

@section('content')

    <div class="container">
        <h1 class="mt-5 pt-5">อัพโหลด หลังฐานการโอน</h1>

                <form action="{{url('upslip')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type='file' name='slipfile'>
                    <input type="hidden" name="order_id" value="{{$order_id}}">
                    <input type='submit' name='button' value='upload' class="btn btn-success">
                </form>
    
    </div>

@endsection