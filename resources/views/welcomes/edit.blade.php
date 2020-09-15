@extends('layouts.app')
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Order details</h3>
    </div>

    <div class="card-body">
        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('welcomes.store')}}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name" />
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>

            <label for="phone_number">Phone Number</label>
            <br>
            <input value="{{old('phone_number')}}" class="form-control {{$errors->first('phone_number') ? "is-invalid": ""}}" type="text" name="phone_number" placeholder="08xxxxx">
            <div class="invalid-feedback">
                {{$errors->first('phone_number')}}
            </div>
            <br>

            <label for="address">Address</label>
            <br>
            <input value="{{old('address')}}" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" type="text" name="address" placeholder="Bandung">
            <div class="invalid-feedback">
                {{$errors->first('address')}}
            </div>
            <br>

            <h5><b>Detail Product:</b></h5>

            <label for="product_name"><b>Product Name</b></label>
            <input value="{{$product->product_name}}" name="product_name" hidden />
            <p>{{$product->product_name}}</p>

            <label for="product_price"><b>Product Price</b></label>
            <input value="{{$product->product_price}}" name="product_price" hidden />
            <p>{{$product->product_price}}</p>

            <label for="product_description"><b>Product Description</b></label>
            <br>
            <text>{{$product->product_description}}</text>
            <br><br>

            @if($product->product_image)
            <img src="{{asset('storage/'.$product->product_image)}}" width="120px" />
            <br>
            @else
            No image
            @endif
            <br>
            <input value="{{$product->product_image}}" name="product_image" hidden />

            <hr class="my-3">

            <input class="btn btn-primary" type="submit" value="Buy" />
        </form>
    </div>
</div>
@endsection