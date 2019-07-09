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
                    <h1>Add Staf</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/staf" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/staf/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('nama_staf') ? 'input-danger' : '' }}" type="text" id="namastaf" name="nama_staf" value="{{ old('nama_staf') }}">
                        <small class="text-danger">{{ $errors->first('nama_staf') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('email') ? 'input-danger' : '' }}" type="email" id="email" name="email" value="{{ old('email') }}">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-xs-2 col-form-label form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('username') ? 'input-danger' : '' }}" type="text" id="username" name="username" value="{{ old('username') }}">
                        <small class="text-danger">{{ $errors->first('username') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('password') ? 'input-danger' : '' }}" type="password" id="password" name="password" value="{{ old('password') }}">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-xs-2 col-form-label form-control-label">Avatar</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('avatar') ? 'input-danger' : '' }}" type="file" id="avatar" name="avatar" value="{{ old('avatar') }}">
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
@endsection