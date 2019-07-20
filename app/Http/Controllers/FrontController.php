<?php

namespace App\Http\Controllers;
// 
use Illuminate\Http\Request;
use App\Testimoni;
use App\Http\Requests\TestimoniRequest;
use Illuminate\Support\Facades\Session;
use App\Paket;
use App\Invoice;
use App\Komplain;
use App\DetailKomplain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Promo;

class FrontController extends Controller
{

    public function index()
    {
        $promo = DB::table('promos')
            ->join('pakets', 'promos.paket_id', '=', 'pakets.id')
            ->where('promos.tgl_selesai', '>', Carbon::now())
            ->get();
        $testimoni = DB::table('testimonis')
            ->join('invoices', 'testimonis.invoice_id', '=', 'invoices.id')
            ->join('pelanggans', 'invoices.pelanggan_id', '=', 'pelanggans.id')
            ->where('testimonis.publish', '=', 1)
            ->select('pelanggans.*', 'invoices.id', 'testimonis.*')
            ->get();
        $tours = Paket::take(6)->get();
        return view('frontend.home', compact('testimoni', 'tours', 'promo'));
    }

    public function tours()
    {
        $tour = Paket::all();

        return view('frontend.tour', compact('tour'));
    }

    public function detilTours($id)
    {
        $tour = Paket::with('fasilitas')->where('id', $id)->first();
        $promo = Promo::with('paket')
            ->where('paket_id', $id)
            ->where('tgl_selesai', '>', Carbon::now())
            ->first();
        $related = Paket::where('id', '!=', $id)->take(6)->get();
        return view('frontend.detiltour', compact('tour', 'related', 'promo'));
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

    public function promotion()
    {
        $promo = DB::table('promos')
            ->join('pakets', 'promos.paket_id', '=', 'pakets.id')
            ->where('promos.tgl_selesai', '>', Carbon::now())
            ->get();
        return view('frontend.promo', compact('promo'));
    }

    public function about()
    {
        return view('frontend.about');
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

            $komplain = Komplain::where('invoice_id', $id)->first();
            if ($komplain == null) {
                $kom = new Komplain;
                $kom->invoice_id = $id;
                $kom->save();
            }

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
        $invId = $komp->invoice_id;
        $dtl = DetailKomplain::where('komplain_id', $kelId)->get();
        return view('frontend.chat', compact('dtl', 'invId'));
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
        $dtl->komplain_id = $kel_id;
        $dtl->sender = $sender;
        $dtl->pesan = $pesan;
        $dtl->save();
    }
}
