@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Paket</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/paket">Paket</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <div class="flash-message" data-title="Thank You" data-flashmessage="{{ Session::get('success') }}"></div>
    <a href="/paket/tambah" class="btn btn-primary mb-3">Tambah Paket</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Paket</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($paket as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->nama_paket }}</td>
                <td>{{ number_format($ktg->harga,0,",",".") }}</td>
                <td>{{ $ktg->categori['nama_kategori'] }}</td>
                <td><img src="/images/paket/{{ $ktg->gambar }}" alt="" class="img-fluid" width="100"></td>
                <td>
                    <a href="/paket/edit/{{ $ktg->id }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="edit"><i class="icofont icofont-edit"></i>
                    </a>
                    <a href="/paket/delete/{{ $ktg->id }}" class="btn btn-danger waves-effect btn-del" data-toggle="tooltip" data-placement="top" title="delete"><i class="icofont icofont-close"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection