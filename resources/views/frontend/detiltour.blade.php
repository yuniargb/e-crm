@extends('frontend.layout')
@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title text-center">{{ $tour->nama_paket }}</h2>
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

<!-- ***** Blog Details Area Start ***** -->
<section class="blog-details-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-content">
                    <!-- Post Details Text -->
                    <div class="post-details-text">
                        <div class="row justify-content-center">
                            <div class="col-12 row justify-content-center landscape mb-50">
                                <img class="gambar-tour" src="/images/paket/{{ $tour->gambar }}" alt="">
                            </div>
                            <div class="col-12 col-lg-10">
                                <h2>Facility</h2>

                                @foreach($tour->fasilitas as $fal)
                                <p><b>-{{ $fal->nama_fasilitas }}</b></p>
                                @endforeach

                                <h4>Price: <span class="text-primary">Rp {{ number_format($tour->harga, 0, ',', '.') }}</span></h4>
                                <!-- Related News Area -->
                                <div class="related-news-area">
                                    <h2 class="mb-4">Related Tour</h2>

                                    <div class="row">
                                        @foreach($related as $rel)
                                        <!-- Single Blog Post -->
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post bg-img mb-50" style="background-image: url(/images/paket/{{ $rel->gambar }});">
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="/tours/detil/{{$rel->id}}" class="post-title">{{ $rel->nama_paket }}</a>
                                                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Details Area End ***** -->
@endsection