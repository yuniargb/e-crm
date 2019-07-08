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
                    <h1>Add Categori</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/kategori" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/kategori/store" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('nama_kategori') ? 'input-danger' : '' }}" type="text" id="namakategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
                        <small class="text-danger">{{ $errors->first('nama_kategori') }}</small>
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