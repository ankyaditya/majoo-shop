@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form action="{{route('welcomes.index')}}">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <input value="{{Request::get('keyword')}}" name="keyword" class="form-control" type="text" placeholder="Input product name" />
        </div>
        <input type="submit" value="Search" class="btn btn-primary">
    </div>
</form>
<br><br>
<div class="container">
    <div id="products" class="row view-group">
        @foreach($products as $product)
        <div class="item col-xs-3 col-lg-3 d-flex align-items-stretch" style="padding: 10px;">
            <div class="thumbnail card">
                <div class="img-event">
                    @if($product->product_image)
                    <img class="group list-group-image img-fluid" src="{{asset('storage/'.$product->product_image)}}"/>
                    @else
                    <img class="group list-group-image img-fluid" src="http://placehold.it/400x250/000/fff" alt="" />
                    @endif
                </div>
                <div class="caption card-body">
                    <h4 class="group card-title inner list-group-item-heading">{{$product->product_name}}</h4>
                    <p class="group inner list-group-item-text">{{$product->product_description}}</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">{{$product->product_price}}</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="{{route('welcomes.edit',['id'=>$product->id])}}">
                                Add to cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<div class="container">
    {{$products->appends(Request::all())->links()}}
</div>
@endsection