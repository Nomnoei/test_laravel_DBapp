@extends('layout.mainlayout')

@section('content')

<div class="container">
        <h2>แสดงรายการสินค้า</h2>
        <table class='table mt-5'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">หมายเลขสั้งซื้อ</th>
                    <th scope="col">ผู้ชื้อ</th>
                    <th scope="col">สถานะการซื้อ</th>
                
                </tr>
        
            </thead>
            <tbody>
                @foreach ($orders_list as $orders_lists)
                    @foreach ($users as $user)
                        @if ($orders_lists->orber_member == $user->id)
                        @if ($orders_lists->orber_status == 0)
                            
                       
                        <tr>
                            <th scope="row">{{$orders_lists->id}}</th>
                            <td><a href="#">{{$user->name}}</a></td>
                            <td>
                                <form action="manage" method="get">
                                    <select name="status">
                                        <option value="1">ยื่นยันการซื้อ</option>
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

@endsection