<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use App\Http\Requests\TestimoniRequest;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    public function storeTestimonial(TestimoniRequest $request)
    {
        $testi = new Testimoni;
        $testi->invoice_id = $request->invoice_id;
        $testi->isi_testimoni = $request->pesan;
        $testi->rating = $request->rating;

        $testi->save();
        Session::flash('success', 'WO successfully deleted');
        return view('/testimonial');
    }
}
