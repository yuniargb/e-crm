<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use App\Http\Requests\TestimoniRequest;
use Illuminate\Support\Facades\Session;
use App\Paket;
use App\Invoice;
use App\Komplain;
use App\DetailKomplain;

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

    public function getInv($id)
    {
        $inv = Invoice::where('id', $id)->first();
        if ($inv) {
            $komp = new Komplain;
            $komp->invoice_id = $id;
            $komp->save();

            $data = [
                'id' => $inv->id
            ];

            $sesi = Session::put('chat', $id);
            return json_encode($data, $sesi);
        }
    }

    public function chat($id)
    {
        $komp = Komplain::where('invoice_id', $id)->first();
        $kelId = $komp->id;
        $dtl = DetailKomplain::where('keluhan_id', $kelId)->get();
        return view('frontend.chat', compact('dtl'));
    }

    public function chatSend(Request $request)
    {
        // get request data
        $invId = $request->invoiceId;
        $pesan = $request->message;

        // get komplain
        $komp = Komplain::where('invoice_id', $invId)->first();
        $kel_id = $komp->id;
        $sender = $komp->invoice_id;

        // Save to detail
        $dtl = new DetailKomplain;
        $dtl->keluhan_id = $kel_id;
        $dtl->sender = $sender;
        $dtl->pesan = $pesan;
        $dtl->save();
    }
}
