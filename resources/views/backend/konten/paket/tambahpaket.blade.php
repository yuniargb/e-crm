@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="main-header">
        <!-- <h4>Add kategori</h4> -->
    </div>
</div>
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1>Add Paket</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/paket" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/paket/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Paket</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('nama_paket') ? 'input-danger' : '' }}" type="text" id="paket" name="nama_paket" value="{{ old('nama_paket') }}">
                        <small class="text-danger">{{ $errors->first('nama_paket') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Harga</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('harga') ? 'input-danger' : '' }}" type="text" id="harga" name="harga" value="{{ old('harga') }}">
                        <small class="text-danger">{{ $errors->first('harga') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-xs-2 col-form-label form-control-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="js-example-theme-single select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="kategori">
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('kategori') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-xs-2 col-form-label form-control-label">Gambar</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('gambar') ? 'input-danger' : '' }}" type="file" id="gambar" name="gambar" value="{{ old('gambar') }}">
                        <small class="text-danger">{{ $errors->first('gambar') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fasilitas" class="col-xs-2 col-form-label form-control-label">Fasilitas</label>
                    <div class="col-sm-8">
                        <input class="form-control {{ $errors->has('fasilitas') ? 'input-danger' : '' }}" type="text" id="fasilitas" name="fasilitas[]" value="{{ old('fasilitas') }}">
                        <small class="text-danger">{{ $errors->first('fasilitas') }}</small>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-warning" id="tmbh" type="button"><i class="icofont icofont-plus-square"></i></button>
                    </div>
                </div>
                <div id="isi">

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection