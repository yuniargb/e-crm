@extends('frontend.layout')
@section('content')

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title text-center">About</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Curve -->
    <div class="breadcrumb-bg-curve">
        <img src="/fassets/img/core-img/curve-5.png" alt="">
    </div>
</div>
<div class="container mt-5 text-center">
    <p>Perusahaan kami dilengkapi dengan teknologi komputer terkini untuk akses online yang efisien dan database lengkap informasi penting</p>
    <p>MIKA TOUR berlokasi di dalam Universitas Budiluhur. MIKA TOUR merupakan perusahaan yang menyediakan segala keperluan yang berhubungan dengan kedinasan Universitas Budiluhur, TK, SD, SMP, SMA dan SMK Budiluhur. Disamping itu kami banyak melayani perusahaan lain diluar Budiluhur. Pengalaman kami dalam menyediakan segala kebutuhan perjalanan dapat dilaksanakan dengan baik.</p>
</div>
<!-- ***** Breadcrumb Area End ***** -->
<!-- ***** About Us Area Start ***** -->
<section class="uza-about-us-area section-padding-80">
    <div class="container">
        <div class="row align-items-center">
            <!-- About Thumbnail -->
            <div class="col-12 col-lg-6">
                <div class="about-us-thumbnail mb-80">
                    <img src="/fassets/img/bg-img/2.jpg" alt="">
                    <!-- Video Area -->
                    <div class="uza-video-area hi-icon-effect-8">
                        <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i class="fa fa-binoculars" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <!-- About Us Content -->
            <div class="col-12 col-lg-6">
                <div class="section-heading mb-5">
                    <h2>Our Mission</h2>
                </div>

                <div class="about-us-content mb-80">
                    <div class="about-tab-area">
                        <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Vision</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"> Mission</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Mona Tab Content -->
                    <div class="about-tab-content">
                        <div class="tab-content" id="mona_modelTabContent">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                <!-- Tab Content Text -->
                                <div class="tab-content-text">
                                    <p>MIKA TOUR dapat mengikuti berita dan isu internasional saat ini yang memungkinkan sehingga memprediksi tren masa depan. Kami mengantisipasi bahwa pariwisata akan mempercepat secara global karena sebagian besar pelanggan menikmati pendapatan yang lebih tinggi dan bersiap untuk mengetahui sesuatu yang baru dan menarik untuk melakukan perjalanan</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                <!-- Tab Content Text -->
                                <div class="tab-content-text">
                                    <p>Sementara sektor pariwisata di Indonesia masih sangat berkembang, kami akan berusaha mengembangkan sektor pariwisata Indonesia menjadi lebih terkenal di mata Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Background Pattern -->
    <div class="about-bg-pattern">
        <img src="/fassets/img/core-img/curve-2.png" alt="">
    </div>
</section>
<!-- ***** About Us Area End ***** -->
@endsection