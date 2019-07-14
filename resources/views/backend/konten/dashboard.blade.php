@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Dashboard</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="icofont icofont-home"></i></a>
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="chartPelanggan"></div>
            </div>
            
        </div>
    </div>
    <div class="col-md-12" style="margin-top:10px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="chartPaket"></div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    Highcharts.chart('chartPelanggan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Top Pelanggan'
        },
        subtitle: {
            text: 'Mika Travel Indonesia'
        },
        xAxis: {
            categories: {!!json_encode($pel)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Invoice'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total',
            data: {!!json_encode($total)!!}

        }]
    });
    Highcharts.chart('chartPaket', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Top Paket'
        },
        subtitle: {
            text: 'Mika Travel Indonesia'
        },
        xAxis: {
            categories: {!!json_encode($pakets)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Top Paket'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total',
            data: {!!json_encode($terjual)!!}

        }]
    });
</script>
@stop