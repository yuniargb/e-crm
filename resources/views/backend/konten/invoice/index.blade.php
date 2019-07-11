@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Invoice</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/invoice">Invoice</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <div class="flash-message" data-title="Thank You" data-flashmessage="{{ Session::get('success') }}"></div>
    <a href="/invoice/tambah" class="btn btn-primary mb-3">Tambah Invoice</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No Invoice</th>
                <th>Tanggal Pesan</th>
                <th>Total Harga</th>
                <th>Pelanggan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($invoice as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->id }}</td>
                <td>{{ date('d-m-Y', strtotime($ktg->tgl_inv)) }}</td>
                <td>{{ $ktg->total_hrg }}</td>
                <td>{{ $ktg->pelanggan['nama_pelanggan'] }}</td>
                <td>
                    <a href="/invoice/cetak/{{ $ktg->id }}" target="_blank" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="print"><i class="icofont icofont-print"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection