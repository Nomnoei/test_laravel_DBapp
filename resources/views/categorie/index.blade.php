@extends('layout.mainlayout')

@section('content')
    <div class="container">
            <hr>
        <div align="center"><a href="{{URL::to('categorie/create')}}" class="btn btn-success mt-5">เพิ่มหมวดหมู่</a></div>
            <table class='table mt-5'>
                    <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categorie Title</th>
                                <th scope="col">Action</th>
                            
                            </tr>
                    
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($categorie as $categories)
                                 <th scope="row">{{$categories->id}}</th>
                                 <td>{{$categories->cate_title}}</td>
                                 <td>
                                    <div class="btn-group" role="group">
                                    <a href="{{URL::to('categorie/'.$categories->id.'/edit')}}">
                                        <button type="button" class="btn btn-warning mr-1">Edit</button>
                                    </a>
                        
                                    <form action="{{url('categorie',[$categories->id])}}" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="submit" value="delete" class="btn btn-danger">
                                    </form>
                                    </div>
                        
                                </td>


                                @endforeach
                            </tr>
                        </tbody>
            </table>
    </div>
@endsection