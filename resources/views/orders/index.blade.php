@extends("layouts.global")
@section("content")

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Order List</h3>
    </div>

    <form action="{{route('orders.index')}}">
        <input type="text" name="from" id="from" style="display:none" value="{{Request::get('from')}}">
        <input type="text" name="to" id="to" style="display:none" value="{{Request::get('to')}}">

        <div class="form-group" style="margin-left:15px;">
            <button class="btn btn-info my-3" style="display:inline">
                <div class="tooltop">
                    <i class="nav-icon fa fa-filter"></i>
                    <span>Sort</span>
                </div>
            </button>
            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: fit-content; display:inline">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>
        </div>
    </form>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><b>Order Id</b></th>
                    <th><b>Order Name</b></th>
                    <th><b>Phone</b></th>
                    <th><b>Address</b></th>
                    <th><b>Status</b></th>
                    <th><b>Action</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id_pesanan}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone_number}}</td>
                    <td>{{$order->address}}</td>
                    <td>
                        @if($order->status == "Verified")
                        <span class="badge badge-success">
                            {{$order->status}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$order->status}}
                        </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('orders.show', ['id' => $order->id])}}" class="btn btn-primary btn-sm">
                            <div class="tooltop"><i class="nav-icon fa fa-search" style="float:center"></i>
                                <span>Detail</span>
                            </div>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            document.getElementById('from').value = start.format('YYYY-MM-DD');
            document.getElementById('to').value = end.format('YYYY-MM-DD');
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });
</script>
@endsection