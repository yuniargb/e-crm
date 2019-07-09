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
                    <h1>Add Invoice</h1>
                </div>
                <div class="col-sm-2">
                    <div class="d-flex justify-content-end">
                        <a href="/invoice" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-block">
            <form action="/invoice/store" method="post">
                @csrf
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Pelanggan</label>
                    <div class="col-sm-10">
                        <select class="js-example-theme-single select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="pelanggan">
                            @foreach($pelanggan as $kat)
                            <option value="{{ $kat->id }}" {{ old('pelanggan') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('pelanggan') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Peserta</label>
                    <div class="col-sm-5">
                        <input class="form-control {{ $errors->has('dokumen') ? 'input-danger' : '' }}" type="text" id="dokumen" name="dokumen" value="{{ old('dokumen') }}" placeholder="Masukan Dokumen">
                        <small class="text-danger">{{ $errors->first('dokumen') }}</small>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control {{ $errors->has('peserta') ? 'input-danger' : '' }}" type="text" id="peserta" name="peserta" value="{{ old('peserta') }}" placeholder="Masukan Nama Peserta">
                        <small class="text-danger">{{ $errors->first('peserta') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namakategori" class="col-xs-2 col-form-label form-control-label">Paket</label>
                    <div class="col-sm-5">
                        <select class="js-example-theme-single select2-hidden-accessible form-control mb-3" tabindex="-1" aria-hidden="true" id="paket" name="paket">
                            @foreach($paket as $kat)
                            <option data-harga="{{ $kat->harga }}" data-paket="{{ $kat->nama_paket }}" value="{{ $kat->id }}" {{ old('paket') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_paket }}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('paket') }}</small>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control {{ $errors->has('tgl') ? 'input-danger' : '' }}" type="date" id="tgl" name="tgl" value="{{ old('tgl') }}" placeholder="Masukan Tanggal Berangkat">
                        <small class="text-danger">{{ $errors->first('tgl') }}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <button class="btn btn-warning btn-block " id="tmbh_psrt" type="button"><i class="icofont icofont-plus-square"></i></button>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Batal</th>
                                <th scope="col">Peserta</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Dokumen</th>
                                <th scope="col">Tanggl Berangkat</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody id="invoce">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center" colspan="5">TOTAL</th>
                                <th class="text-center" id="total"></th>
                                <input class="form-control" type="hidden" name="totals" id="hasil">
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection