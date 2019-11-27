@extends('layout.mainlayout')

@section('content')

<div class="container">
    <h3>รายชื่อสินค้า</h3>
    <hr>
    
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="text" id="search" class="form-control" name="search" size="100%" placeholder="ค้นหา">

            <script
                    src="https://code.jquery.com/jquery-3.2.1.js"
                    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                    crossorigin="anonymous"></script>
                    <script type="text/javascript">

                    $(document).ready(function() {
                        function fet_data(id = ''){
                                $.ajax({
                                    url: '/search-product',
                                    data: {'id':id, "_token":$('#token').val()},
                                    type: 'POST',
                                    success: function (response) {
                                        $('tbody').html(response);
                                    },
                                    error: function (response) {

                                    }
                                });
                            }
                            $(document).on('keyup','#search',function(){
                        var text = $(this).val();
                        fet_data(text);
                    });      
                });
            </script>

    <table class='table mt-2'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Data</th>
                    <th scope="col">Product Pice</th>
                
                </tr>
        
            </thead>
            <tbody>
                
                    
                @foreach ($products as $product)
                <tr>
                <th scope="row">{{$product->id}}</th>
                <td>
                    <a href="/select/{{$product->id}}">{{$product->product_tite}}</a>
                </td>
                <td>{{$product->product_data}}</td>
                <td>{{$product->product_npice}}</td>
               
            </tr>
                    
                @endforeach
        
            </tbody>
        
        </table>
        {{ $products->links() }}
</div>



@endsection