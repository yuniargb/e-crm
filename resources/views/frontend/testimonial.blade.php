@extends('frontend.layout')
@section('content')
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title text-center">Testimonial</h2>
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

<!-- ***** Contact Area Start ***** -->
<section class="uza-contact-area section-padding-80">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Contact Form -->
            <div class="col-12 col-lg-8">
                <div class="uza-contact-form mb-80">
                    <div class="contact-heading mb-50">
                        <h4>Thank you for your interest. <br>Please fill out the form below to inquire about our work in Digital.</h4>
                    </div>
                    <form action="/testimonial/store" method="post" id="testimoniForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="invoice_id" id="invoiceId" placeholder="Invoice Number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="namaPelanggan" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="pesan" rows="8" cols="80" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div class="ml-auto mr-auto" id="rateYo"></div>
                                        <p id="rateText"></p>
                                    </div>
                                    <input type="hidden" id="star" name="rating">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn uza-btn btn-3 mt-15">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Google Maps -->
            <div class="col-12">
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11956.9355465873!2d24.0768412544878!3d56.9550599906977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2z4Kaw4Ka_4KaX4Ka-LCDgprLgp43gpq_gpr7gpp_gp43gpq3gpr_gpoY!5e0!3m2!1sbn!2sbd!4v1543911160102" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Contact Area End ***** -->
@endsection