@extends('layout.mainlayout')

@section('content')

<div class="container">
        <h2>แสดงรายการสินค้า</h2>
        <table class='table mt-5'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">หมายเลขสั้งซื้อ</th>
                    <th scope="col">ผู้ชื้อ</th>
                    <th scope="col">รูปหลักฐาน</th>
                    <th scope="col">สถานะการซื้อ</th>
                
                </tr>
        
            </thead>
            <tbody>
                @foreach ($orders_list as $orders_lists)
                    @foreach ($users as $user)
                                              
                       
                        @if ($orders_lists->orber_member == $user->id)
                        @if ($orders_lists->orber_status == 2)
                              
                       
                        <tr>
                            <th scope="row">{{$orders_lists->id}}</th>
                            <td><a href="">{{$user->name}}</a></td>
                            @foreach ($transfers as $transfer)
                            @if ($orders_lists->id == $transfer->order_id)
                                
                            
                            <td><a href="{{URL::to('showimage/'.$transfer->order_id)}}"><img src="{{url('slip/'.$transfer->transfers_pic)}}" alt="{{$transfer->transfers_pic}}" width="100px"></a></td>
                            
                            @endif
                            @endforeach
                            <td>
                                
                                


                                <form action="manage" method="get">
                                    <select name="status">
                                        <option value="1">ยื่นยันการซื้อ</option>
                                        <option value="3">ส่งหลักฐานใหม่</option>
                                    </select>
                                    <input type="hidden" name="member_id" value="{{$user->id}}">
                                    <input type="hidden" name="order_list_id" value="{{$orders_lists->id}}">
                                    <button type="submit" class="btn btn-success">ส่ง</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endif
                       
                    @endforeach
                @endforeach
                   
            </tbody>
        
        </table>
    </div>

    <script type="text/javascript">
        function display_image(){
            var img = document.createElement("img");
            img.src = src;
            img.width = width;
            img.height = height;
            img.alt = alt;

            document.body.appendChild(img);
        }
    </script>

@endsection