@extends('frontend.layout')
@section('content')
<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
    <div class="welcome-slides owl-carousel">

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Background Curve -->
            <div class="background-curve">
                <img src="/fassets/img/core-img/curve-1.png" alt="">
            </div>

            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Mika Tour have thousands <br> <span>holiday</span> destination</h2>
                                <a href="/tours" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Start Exploring</a>
                            </div>
                        </div>
                        <!-- Welcome Thumbnail -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-thumbnail">
                                <img src="/fassets/img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Background Curve -->
            <div class="background-curve">
                <img src="/fassets/img/core-img/curve-1.png" alt="">
            </div>

            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Join us<br> to get <span>In Touch</span></h2>
                                <a href="/signin" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Start Exploring</a>
                            </div>
                        </div>
                        <!-- Welcome Thumbnail -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-thumbnail">
                                <img src="/fassets/img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Background Curve -->
            <div class="background-curve">
                <img src="/fassets/img/core-img/curve-1.png" alt="">
            </div>

            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Already have a trip? <br> <span>Review</span> us to serve you better!</h2>
                                <a href="/testimonial" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Start Exploring</a>
                            </div>
                        </div>
                        <!-- Welcome Thumbnail -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-thumbnail">
                                <img src="/fassets/img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Portfolio Area Start ***** -->
<section class="uza-portfolio-area section-padding-80">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>On Going Promo</h2>
                    <p>See what interest you on our promo!.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Portfolio Slides -->
            <div class="portfolio-sildes owl-carousel">
                @foreach($promo as $prm)
                <!-- Single Portfolio Slide -->
                <div class="single-portfolio-slide">
                    <div class="home-tour-wrapper">
                        <img class="home-tour-img" src="/images/paket/{{ $prm->gambar }}" alt="">
                    </div>
                    <!-- Overlay Effect -->
                    <div class="overlay-effect text-center">
                        <h2>{{ $prm->nama_paket }}</h2>
                        <h4 class="text-danger">Sale {{ $prm->diskon }}% <i class="fa fa-tags"></i></h4>
                        <h4 class="text-danger"><strike>Rp {{ number_format($prm->harga, 0, ',', '.') }}</strike></h4>
                        @php
                        $hrg = $prm->harga;
                        $disc = $prm->diskon;
                        $bfr = ($hrg*$disc)/100;
                        $aftr = $hrg - $bfr;
                        @endphp
                        <h4>Only Rp {{ number_format($aftr, 0, ',', '.') }}</h4>
                        <h2 class="text-primary">Available until {{ date('d F Y', strtotime($prm->tgl_selesai)) }}</h2>
                    </div>
                    <!-- View More -->
                    <div class="view-more-btn">
                        <a href="/tours/detil/{{ $prm->id }}"><i class="arrow_right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="/promotion" class="btn uza-btn btn-2 mt-4">Load More</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Our Tour Packages</h2>
                    <p>We stay on top of our service by being experts in yours.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Portfolio Slides -->
            <div class="portfolio-sildes owl-carousel">
                @foreach($tours as $tr)
                <!-- Single Portfolio Slide -->
                <div class="single-portfolio-slide">
                    <div class="home-tour-wrapper">
                        <img class="home-tour-img" src="/images/paket/{{ $tr->gambar }}" alt="">
                    </div>
                    <!-- Overlay Effect -->
                    <div class="overlay-effect text-center">
                        <h2>{{ $tr->nama_paket }}</h2>
                        <h3 class="text-primary">Rp {{ number_format($tr->harga, 0, ',', '.') }}</h3>
                    </div>
                    <!-- View More -->
                    <div class="view-more-btn">
                        <a href="/tours/detil/{{ $tr->id }}"><i class="arrow_right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="/tours" class="btn uza-btn btn-2 mt-4">Load More</a>
        </div>
    </div>

    <!-- Client Feedback Area Start -->
    <div class="clients-feedback-area mt-80 section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Testimonial Slides -->
                    <div class="testimonial-slides owl-carousel">
                        @foreach($testimoni as $tst)
                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="/images/{{ $tst->avatar }}" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>“{{ $tst->isi_testimoni }}”</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <span class="fa fa-star {{ ( 1 <= $tst->rating ? 'text-warning' : '') }}"></span>
                                    <span class="fa fa-star {{ ( 2 <= $tst->rating ? 'text-warning' : '') }}"></span>
                                    <span class="fa fa-star {{ ( 3 <= $tst->rating ? 'text-warning' : '') }}"></span>
                                    <span class="fa fa-star {{ ( 4 <= $tst->rating ? 'text-warning' : '') }}"></span>
                                    <span class="fa fa-star {{ ($tst->rating == 5 ? 'text-warning' : '') }}"></span>
                                </div>
                                <span>{{ date('F, d Y', strtotime($tst->created_at)) }}</span>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>{{ $tst->nama_pelanggan }}</h5>
                                </div>
                                <!-- Quote Icon -->
                                <div class="row justify-content-end">
                                    <div class="quote-icon"><img src="/fassets/img/core-img/quote.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <a href="/testimonial" class="btn uza-btn btn-2 mt-4">Make your own review</a>
            </div>
        </div>
    </div>
    <!-- Client Feedback Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-line"></div>
    </div>

    <!-- Background Curve -->
    <div class="portfolio-bg-curve">
        <img src="/fassets/img/core-img/curve-3.png" alt="">
    </div>
</section>
<!-- ***** Portfolio Area End ***** -->
@endsection