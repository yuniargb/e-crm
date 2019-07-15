<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Title -->
    <title>Mika Tour</title>

    <!-- Favicon -->
    <link rel="icon" href="/fassets/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/fassets/style.css">

    <!-- My Css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- RateYo CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="/">Mika Tour</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav mr-5">
                            <ul id="nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="/tours">Tours</a></li>
                                <li><a href="/promotion">Promo</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/testimonial">Testimonial</a></li>
                                <li><a href="#"><i class="fa fa-user"></i></a>
                                    <ul class="dropdown">
                                        @if (Route::has('login'))
                                        @auth('pelanggan')
                                        <li><a href="/customer">My Account</a></li>
                                        <li><a href="/customer/logout">Logout</a></li>
                                        @else
                                        <li><a href="/signin">Login</a></li>
                                        @endauth
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    @yield('content')


    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Contact Us</h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h4 class="text-primary">(+62) 21 58908586</h4>
                            <p>Jl. Ciledug Raya, Petukangan Utara <br> Universitas Budiluhur <br> Jakarta Selatan</p>
                        </div>
                        <p class="mb-0">Mon - Fri: 8:00 - 16:00 <br>
                            Closed on Weekends</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Quick Link</h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                                <li><a href="/">Home</a></li>
                                <li><a href="/tours">Tours</a></li>
                                <li><a href="/promotion">Promo</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/testimonial">Testimonial</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Follow Us On</h4>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="https://www.facebook.com/mikatour.id.7" target="_blank" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/mikatour_id/" target="_blank" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="chatDiv" class="card">
        <div class="card-body">
            @php $sesi = session()->get('chat') @endphp
            <div id="sesi-chat" data-sesichat="{{ Session::get('chat') }}"></div>
            <h3 class="text-center">Mika Tour Support</h3>
            <hr>
            <div id="valid">
                <div id="viewChat">
                </div>
                <form action="/chat/send" id="formChat" method="post">
                    @csrf
                    <input type="hidden" id="chatIdInvoice">
                    <input type="text" name="chat" id="chatMessage" class="form-control" placeholder="Write a message..">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success mt-2"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
            <div id="invalid">
                <input type="text" id="idInvoice" class="form-control" placeholder="Invoice Number">
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-round" id="btnChat"><i class="fa fa-headphones fa-10x"></i></button>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <!-- Popper js -->
    <script src="/fassets/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/fassets/js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="/fassets/js/uza.bundle.js"></script>
    <!-- Active js -->
    <script src="/fassets/js/default-assets/active.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- RateYo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <!-- My Script -->
    <script src="/js/script.js?v=1.2"></script>
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\TestimoniRequest', '#testimoniForm'); !!}

</body>

</html>