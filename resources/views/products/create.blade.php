@extends("layouts.global")
@section("content")
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New Product</h3>
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('products.store')}}" method="POST">
            @csrf
            <label for="product_name">Product Name</label>
            <input value="{{old('product_name')}}" class="form-control {{$errors->first('product_name') ? "is-invalid": ""}}" placeholder="Iphone X" type="text" name="product_name" id="product_name" />
            <div class="invalid-feedback">
                {{$errors->first('product_name')}}
            </div>
            <br>

            <label for="product_price">Product Price</label>
            <br>
            <input value="{{old('product_price')}}" class="form-control {{$errors->first('product_price') ? "is-invalid": ""}}" type="number" name="product_price" placeholder="150000">
            <div class="invalid-feedback">
                {{$errors->first('product_price')}}
            </div>
            <br>

            <label for="product_description">Product Description</label>
            <textarea value="{{old('product_description')}}" class="form-control {{$errors->first('product_description') ? "is-invalid": ""}}" name="product_description" id="product_description" placeholder="Description"></textarea>
            <div class="invalid-feedback">
                {{$errors->first('product_description')}}
            </div>
            <br>

            <label for="product_image">Product Image</label>
            <br>
            <input value="{{old('product_image')}}" class="form-control {{$errors->first('product_image') ? "is-invalid": ""}}" id="product_image" name="product_image" type="file">
            <div class="invalid-feedback">
                {{$errors->first('product_image')}}
            </div>
            <hr class="my-3">

            <input class="btn btn-primary" type="submit" value="Save" />
        </form>
    </div>
</div>
@endsection