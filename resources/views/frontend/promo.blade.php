@extends('frontend.layout')
@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title text-center">Ongoing Promo</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Curve -->
    <div class="breadcrumb-bg-curve">
        <img src="/fassets/img/core-img/curve-5.png" alt="">
    </div>
</div>

<!-- ****** Gallery Area Start ****** -->
<section class="uza-portfolio-area section-padding-80">

    <div class="container-fluid">
        <div class="row uza-portfolio">
            @foreach($promo as $prm)
            <!-- Single Portfolio Item -->
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item ux-ui-design">
                <div class="single-portfolio-slide">
                    <div class="tour-image-box">
                        <img class="tour-image" src="/images/paket/{{ $prm->gambar }}" alt="">
                    </div>
                    <!-- Overlay Effect -->
                    <div class="overlay-effect text-center">
                        <h4>{{ $prm->nama_paket }}</h4>
                        <p class="text-danger">Sale {{ $prm->diskon }}% <i class="fa fa-tags"></i></p>
                        <p class="text-danger"><strike>Rp {{ number_format($prm->harga, 0, ',', '.') }}</strike></p>
                        @php
                        $hrg = $prm->harga;
                        $disc = $prm->diskon;
                        $bfr = ($hrg*$disc)/100;
                        $aftr = $hrg - $bfr;
                        @endphp
                        <p>Only Rp {{ number_format($aftr, 0, ',', '.') }}</p>
                        <p>Available until {{ date('d F Y', strtotime($prm->tgl_selesai)) }}</p>
                    </div>
                    <!-- View More -->
                    <div class="view-more-btn">
                        <a href="/tours/detil/{{ $prm->id }}"><i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ****** Gallery Area End ****** -->
@endsection