@extends('layout.mainlayout')

@section('content')

<div class="container">

        <h3 align='center' class="mt-5 pt-5">บริษัท ราซาด้า</h3>
        <p align='center'> 258 หมู่ 99 ต หางดง อ หางดง จ หางดง </p>
        <h2 align='center' >ใบรับสินค้า</h2>
        
        <table class='table mt-5'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">รหัสสินค้า</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคาสินค้า</th>
                    
                    </tr>
            
                </thead>
                <tbody>
                     <?php $total_money =0; ?>
                    @foreach ($order_details as $order_detail)
                        @foreach ($products as $product)
                            @if ($order_detail->product_id == $product->id)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->product_tite}}</td>
                                    <td>{{$order_detail->product_amout}}</td>
                                    <?php $sun_money = $order_detail->product_amout * $product->product_spice;
                                        $total_money = $total_money + $sun_money; ?>
                                   

                                    <td>{{$sun_money}}</td>

                                    
                                </tr>
                            @endif
                        @endforeach
                    @endforeach

                    <tr>
                        <th colspan='3'> รวม </th>
                        <td>{{$total_money}}</td>
                    </tr>
                      
                </tbody>
            
            </table>
    

</div>
    
@endsection