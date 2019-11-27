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
                            <?php $status="ส่งหลักฐาน"; $num = 0;?>
                            @break
                        @case(1)
                            <?php $status="ยืนยัน"; $num = 1;?>
                            @break
                            @case(2)
                            <?php $status="รอการยืนยัน"; $num = 2;?>
                            @break
                            @case(3)
                            <?php $status="ส่งหลักฐานใหม่"; $num = 3;?>
                            @break
                        @default
                            
                    @endswitch
                    
                <tr>
                    <th>{{$orders_lists->id}}</th>

                    @if ($num == 1)
                        <td>{{$status}}</td>
                    @elseif($num == 0)
                    <td> <a href="{{URL::to('transfer/?order_id='.$orders_lists->id)}}" class="btn btn-success">ส่งหลักฐาน</a></td>
                    @elseif($num == 2)
                    <td>{{$status}}</td>
                    @elseif($num == 3)
                    <td><a href="{{URL::to('transfer/?order_id='.$orders_lists->id)}}" class="btn btn-success">ส่งหลักฐานใหม่</a> </td>
                    @endif
                    
                    

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