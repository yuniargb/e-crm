@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="main-header">
        <!-- <h4>Add kategori</h4> -->
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h1>Laporan Top Pelanggan</h1>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="cetakpelanggan" target="_blank" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Tanggal Awal</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('tgl_awal') ? 'input-danger' : '' }}" type="date" id="tgl_awal" name="tgl_awal" value="{{ old('tgl_awal') }}">
                        <small class="text-danger">{{ $errors->first('tgl_awal') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Tanggal Akhir</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('tgl_akhir') ? 'input-danger' : '' }}" type="date" id="tgl_akhir" name="tgl_akhir" value="{{ old('tgl_akhir') }}">
                        <small class="text-danger">{{ $errors->first('tgl_akhir') }}</small>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection