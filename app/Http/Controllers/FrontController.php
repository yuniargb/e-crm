<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use App\Http\Requests\TestimoniRequest;
use Illuminate\Support\Facades\Session;
use App\Paket;
use App\Invoice;

class FrontController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }

    public function tours()
    {
        $tour = Paket::all();
        return view('frontend.tour', compact('tour'));
    }

    public function detilTours($id)
    {
        $tour = Paket::with('fasilitas')->where('id', $id)->first();
        $related = Paket::where('id', '!=', $id)->inRandomOrder()->take(4)->get();
        return view('frontend.detiltour', compact('tour', 'related'));
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    public function invoiceId($invoiceId)
    {
        $inv = Invoice::with('pelanggan')->where('id', $invoiceId)->first();
        if ($inv) {
            $data = [
                'name' => $inv->pelanggan['nama_pelanggan']
            ];
            return json_encode($data);
        }
    }

    public function storeTestimonial(TestimoniRequest $request)
    {
        $testi = new Testimoni;
        $testi->invoice_id = $request->invoice_id;
        $testi->isi_testimoni = $request->pesan;
        $testi->rating = $request->rating;

        $testi->save();
        Session::flash('success', 'Your testimonial will make us better');
        return redirect('/testimonial');
    }
}
