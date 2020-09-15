@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Status</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart1" height="150"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                <li><i class="fa fa-circle-o"></i> All Order: {{$allorder}}</li>
                                <br>
                                <li><i class="fa fa-circle-o text-success"></i> Verified: {{$verifiedorder}}</li>
                                <br>
                                <li><i class="fa fa-circle-o text-danger"></i> Not Verified: {{$notverifiedorder}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var verifiedOrder = "<?php echo $verifiedorder; ?>";
        var notVerifiedOrder = "<?php echo $notverifiedorder; ?>";

        var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
        var pieChart = new Chart(pieChartCanvas)
        var PieData = [{
                value: verifiedOrder,
                color: '#00a65a',
                highlight: '#00a65a',
                label: 'Verified Order'
            },
            {
                value: notVerifiedOrder,
                color: '#DC3545',
                highlight: '#DC3545',
                label: 'Not Verified Order'
            }
        ]
        var pieOptions = {
            segmentStrokeColor: '#fff',
            segmentStrokeWidth: 2,
            animationSteps: 100,
            animationEasing: 'easeOutBounce',
            animateRotate: true,
            animateScale: true,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }
        pieChart.Doughnut(PieData, pieOptions)
    })
</script>
@endsection