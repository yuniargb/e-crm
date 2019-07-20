@extends('frontend.layout')
@section('content')
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <div class="text-right">
                        <h1>Hi <span class="text-primary">{{ Auth::user()->nama_pelanggan}}</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background Curve -->
    <div class="breadcrumb-bg-curve">
        <img src="/fassets/img/core-img/curve-5.png" alt="">
    </div>
</div>
<!-- ***** Contact Area Start ***** -->
<section class="uza-contact-area section-padding-80">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact Form -->
            <div class="col-12 col-lg-8">
                <div class="uza-contact-form mb-80">
                    <div class="contact-heading mb-50">
                        <div class="table-responsive">
                            <h5 class="text-center">Here is your history trip</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No Invoice</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Total Harga</th>
                                        <th>Pelanggan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoice as $inv)
                                    <tr>
                                        @foreach($inv->invoice as $in)
                                        <td>{{ $in->id }}</td>
                                        <td>{{ date('d-m-Y', strtotime($in->tgl_inv)) }}</td>
                                        <td>{{ number_format($in->total_hrg,0,",",".") }}</td>
                                        <td>{{ $inv->nama_pelanggan }}</td>
                                        <td>
                                            <a href="/customer/cetak/{{ $in->id }}" target="_blank" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="top" title="print"><i class="fa fa-print"></i>
                                            </a>
                                        </td>
                                        @endforeach
                                    </tr>>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection