@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Promo</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/promo">Promo</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <div class="flash-message" data-title="Thank You" data-flashmessage="{{ Session::get('success') }}"></div>
    <a href="/promo/tambah" class="btn btn-primary mb-3">Tambah Promo</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Diskon</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Paket</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($promosi as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->diskon }}%</td>
                <td>{{ date('d-m-Y', strtotime($ktg->tgl_mulai)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ktg->tgl_selesai)) }}</td>
                <td>{{ $ktg->paket['nama_paket'] }}</td>
                <td>
                    <a href="/promo/hapus/{{ $ktg->id }}" class="btn btn-danger waves-effect btn-del" data-toggle="tooltip" data-placement="top" title="delete"><i class="icofont icofont-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection