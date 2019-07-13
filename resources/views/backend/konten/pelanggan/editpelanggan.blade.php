@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <!-- <h4>Kategori</h4> -->
            <!-- <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/kategori">Kategori</a>
                </li>
            </ol> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>Edit Pelanggan</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex justify-content-end">
                            <a href="/pelanggan" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <form action="/pelanggan/update/{{ $ktg->id }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="namapelanggan" class="col-xs-2 col-form-label form-control-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('nama_pelanggan') ? 'input-danger' : '' }}" type="text" id="namapelanggan" name="nama_pelanggan" value="{{ $ktg->nama_pelanggan }}">
                            <small class="text-danger">{{ $errors->first('nama_pelanggan') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('no_telepon') ? 'input-danger' : '' }}" type="text" id="no_telepon" name="no_telepon" value="{{ $ktg->no_telp }}">
                            <small class="text-danger">{{ $errors->first('no_telepon') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection