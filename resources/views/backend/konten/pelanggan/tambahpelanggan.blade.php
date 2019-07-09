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
                    <h1>Add Pelanggan</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/pelanggan" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/pelanggan/store" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('nama_pelanggan') ? 'input-danger' : '' }}" type="text" id="namapelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                        <small class="text-danger">{{ $errors->first('nama_pelanggan') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('email') ? 'input-danger' : '' }}" type="email" id="email" name="email" value="{{ old('email') }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('no_telepon') ? 'input-danger' : '' }}" type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}">
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
@endsection