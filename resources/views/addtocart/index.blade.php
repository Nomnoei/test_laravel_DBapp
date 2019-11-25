
@extends('layout.mainlayout')

{{$count=count($_SESSION['id'])}}
@section('content')

    <div class="container">
        <h2 class="mt-5 pt-5">ตะกล้าสินค้า</h2>
        <hr>
        <form action="{{url('editamoount')}}" method="get">
        <table class='table mt-5'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Pice</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ยกเลิก</th>
                        <th scope="col">ราคารวม</th>
                    
                    </tr>
            
                </thead>
                <tbody>
                       
                        <?php $total = 0; $sun_pice=0;?>

                        @for ($i = 0; $i < $count; $i++)
                        <tr>
                        <th scope="row"> {{$_SESSION['id'][$i]}}</th>
                        <td>{{$_SESSION['title'][$i]}}</td>
                        <td>{{$_SESSION['pice'][$i]}}</td>
                       
                        <td><input type="text" name="amount[]" value="{{$_SESSION['amount'][$i]}}"></td>
                        <td><a href="" class="btn btn-danger">ยกเลิก</a></td>
                        <td>{{printf("%.2f",$sun_pice += $_SESSION['pice'][$i] * $_SESSION['amount'][$i])}}</td>
                        </tr>
                        @endfor

                        <tr>
                            <td>
                                    @for ($i = 0; $i < $count; $i++)
                                    <?php  $sun_pice = $_SESSION['pice'][$i] * $_SESSION['amount'][$i]; 
                                         $total += $sun_pice;?>
                                     @endfor

                                   ราคารวม :  {{$total}}
                            </td>
                        </tr>
                    
                </tbody>
            
            </table>
            <input type="submit" value="คำนวนราคาใหม่" class="btn btn-warning">
        </form>

            <a href="{{URL::to('select')}}" class="btn btn-danger">กลับไปหน้าเลือกสินค้า</a>

            <a href="" class="btn btn-success pl-5 pr-5">ซื้อ</a>
         

    </div>
     

@endsection

