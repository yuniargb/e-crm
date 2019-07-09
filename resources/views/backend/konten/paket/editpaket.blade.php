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
                        <h1>Edit Paket</h1>
                    </div>
                    <div class="col-sm-2">
                        <div class="d-flex justify-content-end">
                            <a href="/paket" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block">
                <form action="/paket/update/{{ $ktg->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Paket</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('nama_paket') ? 'input-danger' : '' }}" type="text" id="paket" name="nama_paket" value="{{ $ktg->nama_paket }}">
                            <small class="text-danger">{{ $errors->first('nama_paket') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namastaf" class="col-xs-2 col-form-label form-control-label">Harga</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('harga') ? 'input-danger' : '' }}" type="text" id="harga" name="harga" value="{{ $ktg->harga }}">
                            <small class="text-danger">{{ $errors->first('harga') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-xs-2 col-form-label form-control-label">Kategori</label>
                        <div class="col-sm-10">
                            <select class="js-example-theme-single select2-hidden-accessible form-control" tabindex="-1" aria-hidden="true" name="kategori">
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}" {{ $ktg->kategori == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">{{ $errors->first('kategori') }}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="avatar" class="col-xs-2 col-form-label form-control-label">Gambar</label>
                        <div class="col-sm-10">
                            <input class="form-control {{ $errors->has('gambar') ? 'input-danger' : '' }}" type="file" id="gambar" name="gambar" value="{{ $ktg->gambar }}">
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
                        @foreach($ktg->fasilitas as $kt)
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <input class="form-control" type="hidden" name="idfasilitass[]" value="{{ $kt->id }}">
                                <input class="form-control {{ $errors->has('fasilitass') ? 'input-danger' : '' }}" type="text" id="fasilitas" name="fasilitass[]" value="{{ $kt->nama_fasilitas }}">
                                <small class="text-danger">{{ $errors->first('fasilitass') }}</small>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-danger" href="/paket/delfas/{{ $kt->id }}" onClick="confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icofont icofont-minus-square"></i></a>
                            </div>
                        </div>
                        @endforeach
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