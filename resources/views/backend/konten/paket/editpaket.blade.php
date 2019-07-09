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
                        <h1>Edit Staf</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex justify-content-end">
                            <a href="/pelanggan" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <form action="/staf/update/{{ $ktg->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('nama_staf') ? 'input-danger' : '' }}" type="text" id="namastaf" name="nama_staf" value="{{ $ktg->nama_staf }}">
                            <small class="text-danger">{{ $errors->first('nama_staf') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-xs-2 col-form-label form-control-label">Avatar</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('avatar') ? 'input-danger' : '' }}" type="file" id="avatar" name="avatar" value="{{ $ktg->nama_staf }}">
                            <small class="text-danger">{{ $errors->first('avatar') }}</small>
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