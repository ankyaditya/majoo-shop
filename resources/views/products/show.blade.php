@extends('layouts.global')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Product</h3>
    </div>
    <div class="card-body">
        <b>Name:</b> <br />
        {{$product->product_name}}
        <br><br>
        <b>Price:</b><br>
        {{$product->product_price}}
        <br><br>
        <b>Description</b> <br>
        {{$product->product_description}}
        <br><br>
        @if($product->product_image)
        <img src="{{asset('storage/'. $product->product_image)}}" width="128px" />
        @else
        No avatar
        @endif
        <br><br>
    </div>
</div>
@endsection