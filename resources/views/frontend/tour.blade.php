@extends('frontend.layout')
@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title text-center">Tours Package</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Curve -->
    <div class="breadcrumb-bg-curve">
        <img src="/fassets/img/core-img/curve-5.png" alt="">
    </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ****** Gallery Area Start ****** -->
<section class="uza-portfolio-area section-padding-80">

    <div class="container-fluid">
        <div class="row uza-portfolio">
            @foreach($tour as $tr)
            <!-- Single Portfolio Item -->
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item ux-ui-design">
                <div class="single-portfolio-slide">
                    <div class="tour-image-box">
                        <img class="tour-image" src="/images/paket/{{ $tr->gambar }}" alt="">
                    </div>
                    <!-- Overlay Effect -->
                    <div class="overlay-effect text-center">
                        <h4>{{ $tr->nama_paket }}</h4>
                        <p>Rp {{ number_format($tr->harga, 0, ',', '.') }}</p>
                    </div>
                    <!-- View More -->
                    <div class="view-more-btn">
                        <a href="/tours/detil/{{ $tr->id }}"><i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ****** Gallery Area End ****** -->
@endsection