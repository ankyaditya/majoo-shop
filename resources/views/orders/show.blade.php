@extends('layouts.global')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Order</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <b>Order Id:</b><br>
                {{$order->name}}
                <br><br>
                <b>Order Name:</b><br>
                {{$order->name}}
                <br><br>
                <b>Phone:</b> <br>
                {{$order->phone_number}}
                <br><br>
                <b>Address:</b> <br>
                {{$order->address}}
                <br><br>
                <b>Product Name:</b> <br>
                {{$order->product_name}}
                <br><br>
                <b>Product Price:</b> <br>
                {{$order->product_price}}
                <br><br>
                <b>Status:</b> <br>
                @if($order->status == "Verified")
                <span class="badge badge-success">
                    {{$order->status}}
                </span>
                @else
                <span class="badge badge-danger">
                    {{$order->status}}
                </span>
                @endif
                <br><br>
                <b>Order Date:</b> <br>
                {{$order->order_date}}
                <br><br>
            </div>
            <div class="col-6">
                <img src="{{asset('storage/'.$order->product_image)}}" />
            </div>
        </div>
    </div>

    <hr class="my-3">
    <form class="bg-white shadow-sm p-3" action="{{route('orders.update', ['id'=>$order->id])}}" method="POST" onsubmit="return confirm('Verify this order?')">
        @csrf
        <div class="tooltop">
            <input type="hidden" value="PUT" name="_method">
            @if($order->status == "Verified")
            <button type="submit" class="btn btn-success" disabled>
                <span class="fa fa-check-square-o"></span> Verify
            </button>
            @else
            <button type="submit" class="btn btn-success">
                <span class="fa fa-check-square-o"></span> Verify
            </button>
            @endif
        </div>
    </form>
</div>
@endsection