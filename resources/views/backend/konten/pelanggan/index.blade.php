@extends('backend.layout.head')
@section('content')
<div class="row">
    <div class="col-sm-12 p-0">
        <div class="main-header">
            <h4>Pelanggan</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/"><i class="icofont icofont-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a>
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- Row end -->
<div class="bg-cus container-fluid">
    <a class="btn btn-primary mb-5" href="/pelanggan/tambah">Tambah Pelanggan</a>
    <hr>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td><a class="btn btn-warning mb-5" href="/pelanggan/edit">Edit</a> | <a class="btn btn-danger mb-5" href="/pelanggan/hapus">Hapus</a></td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td><a class="btn btn-warning mb-5" href="/pelanggan/edit">Edit</a> | <a class="btn btn-danger mb-5" href="/pelanggan/hapus">Hapus</a></td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td><a class="btn btn-warning mb-5" href="/pelanggan/edit">Edit</a> | <a class="btn btn-danger mb-5" href="/pelanggan/hapus">Hapus</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection