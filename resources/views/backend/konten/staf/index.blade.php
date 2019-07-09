@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Staf</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/staf">Staf</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <a href="/staf/tambah" class="btn btn-primary mb-3">Tambah Staf</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Avatar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($staf as $ktg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $ktg->email }}</td>
                <td>{{ $ktg->username }}</td>
                <td>{{ $ktg->nama_staf }}</td>
                <td><img src="/images/{{ $ktg->avatar }}" class="img-fluid" width="100"></img></td>
                <td>
                    <a href="/staf/edit/{{ $ktg->id }}" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="edit"><i class="icofont icofont-edit"></i>
                    </a>
                    <a href="/staf/delete/{{ $ktg->id }}" class="btn btn-danger waves-effect btn-del" data-toggle="tooltip" data-placement="top" title="delete"><i class="icofont icofont-close"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection