@extends('layout.mainlayout')

@section('content')



<div class="container mt-5">
        @foreach ($transfers as $transfer)
        <div align="center">
                <img src="{{url('slip/'.$transfer->transfers_pic)}}" alt="{{$transfer->transfers_pic}}">
                    <br>

                <a href="{{URL::to('Confimslip/'.$transfer->order_id)}}" class="btn btn-success mr-1 mt-5 mb-5">ยื่นยันหลักฐาน</a><a href="{{URL::to('closeslip/'.$transfer->order_id)}}" class="btn btn-danger mt-5 mb-5">หลักฐานไม่ถูกต้อง</a>
        </div>
        @endforeach
    </div>

@endsection

    

