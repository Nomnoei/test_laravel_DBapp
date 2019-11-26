@extends('layout.mainlayout')

@section('content')

<div class="container">
    <h2>แสดงรายการสินค้า</h2>
    <table class='table mt-5'>
        <thead class="thead-dark">
            <tr>
                <th scope="col">หมายเลขสั้งซื้อ</th>
                <th scope="col">สถานะการซื้อ</th>
                <th scope="col">#</th>
             
            </tr>
    
        </thead>
        <tbody>
                @foreach ($orders_list as $orders_lists)
                    @switch($orders_lists->orber_status)
                        @case(0)
                            <?php $status="ไม่ได้ได้ยืนยัน";?>
                            @break
                        @case(1)
                            <?php $status="ยืนยัน";?>
                            @break
                        @default
                            
                    @endswitch
                    
                <tr>
                    <th>{{$orders_lists->id}}</th>
                    <td>{{$status}}</td>
                    <td>
                        <form action="{{url('OrderData')}}" method="get">
                            <input type="hidden" name="orders_id" value="{{$orders_lists->id}}">
                            <input type="submit" value="ดู" class="btn btn-success">
                        </form>
                    </td>
                </tr>


                @endforeach
              
        </tbody>
    
    </table>
</div>

@endsection