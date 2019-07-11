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
                    <h1>Add Promo</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/promo" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/promo/store" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('mulai') ? 'input-danger' : '' }}" type="date" id="mulai" name="mulai" value="{{ old('mulai') }}" placeholder="Masukan Tanggal Mulai">
                        <small class="text-danger">{{ $errors->first('mulai') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Tanggal Berakhir</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('akhir') ? 'input-danger' : '' }}" type="date" id="akhir" name="akhir" value="{{ old('akhir') }}" placeholder="Masukan Tanggal Berakhir">
                        <small class="text-danger">{{ $errors->first('akhir') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Paket</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-single form-control" id="paket" name="paket">
                            @foreach($paket as $kat)
                            <option data-harga="{{ $kat->harga }}" data-paket="{{ $kat->nama_paket }}" value="{{ $kat->id }}" {{ old('paket') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_paket }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('paket') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Diskon</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input class="form-control {{ $errors->has('diskon') ? 'input-danger' : '' }}" type="number" id="diskon" name="diskon" value="{{ old('diskon') }}" placeholder="Masukan Diskon">
                            <small class="text-danger">{{ $errors->first('diskon') }}</small>
                            <div class="input-group-addon">%</div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Harga Diskon</label>
                    <div class="col-sm-10">
                        <input class="form-control {{ $errors->has('hrg_diskon') ? 'input-danger' : '' }}" type="text" id="hrg_diskon" name="hrg_diskon" value="{{ old('hrg_diskon') }}" placeholder="Masukan Jumlah Diskon" readonly>
                        <small class="text-danger">{{ $errors->first('hrg_diskon') }}</small>
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