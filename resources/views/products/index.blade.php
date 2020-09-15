@extends("layouts.global")
@section("content")

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product List</h3>
    </div>

    <div class="card-body">
        <a href="{{route('products.create')}}" style="padding:13px;" class="btn btn-primary">
            <i class="fa fa-edit"></i> Tambah
        </a>
        <br><br>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><b>Product Name</b></th>
                    <th><b>Product Price</b></th>
                    <th><b>Product Image</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>
                        @if($product->product_image)
                        <img src="{{asset('storage/'.$product->product_image)}}" width="70px" />
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('products.edit',['id'=>$product->id])}}">
                            <div class="tooltop"><i class="nav-icon fa fa-edit" style="float:center"></i>
                                <span>Edit</span>
                            </div>
                        </a>
                        <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-primary btn-sm">
                            <div class="tooltop"><i class="nav-icon fa fa-search" style="float:center"></i>
                                <span>Detail</span>
                            </div>
                        </a>
                        <form onsubmit="return confirm('Delete this product permanently?')" class="d-inline" action="{{route('products.destroy', ['id' => $product->id ])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection