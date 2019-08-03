@extends('backend.layout.head')
@section('content')
<!-- fix -->
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Pelanggan</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <div class="flash-message" data-title="Thank You" data-flashmessage="{{ Session::get('success') }}"></div>
    <a href="/pelanggan/tambah" class="btn btn-primary mb-3">Tambah Pelanggan</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($pelanggan as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->id }}</td>
                <td>{{ $ktg->nama_pelanggan }}</td>
                <td>{{ $ktg->no_telp }}</td>
                <td>{{ $ktg->email }}</td>
                <td>
                    <a href="/pelanggan/edit/{{ $ktg->id }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="edit"><i class="icofont icofont-edit"></i>
                    </a>
                    <a href="/pelanggan/delete/{{ $ktg->id }}" class="btn btn-danger waves-effect btn-del" data-toggle="tooltip" data-placement="top" title="delete"><i class="icofont icofont-close"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection