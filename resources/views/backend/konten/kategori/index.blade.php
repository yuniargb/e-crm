@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Kategori</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/kategori">Kategori</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <a href="/kategori/tambah" class="btn btn-primary mb-3">Tambah Kategori</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($kategori as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->nama_kategori }}</td>
                <td>
                    <a href="/kategori/edit/{{ $ktg->id }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="edit"><i class="icofont icofont-edit"></i>
                    </a>
                    <a href="/kategori/delete/{{ $ktg->id }}" class="btn btn-danger waves-effect btn-del" data-toggle="tooltip" data-placement="top" title="delete"><i class="icofont icofont-close"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection