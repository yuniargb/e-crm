<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kategori;
use App\Staf;
use App\Paket;
use App\Fasilitas;
use App\Promo;
use App\Invoice;
use App\Peserta;
use PDF;
use Validator;
use Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Testimoni;
use Illuminate\Support\Facades\Auth;
use App\DetailKomplain;
use App\Komplain;
use Illuminate\Support\Facades\Hash;

class BackController extends Controller
{
    private $chat;
    public function __construct()
    {
        $this->middleware('auth:staf');
    }

    // Dasboard
    public function index()
    {
        return view('backend.konten.dashboard');
    }

    // pelanggan
    // List Pelanggan
    public function pelanggan()
    {
        $pelanggan = Pelanggan::all();
        return view('backend.konten.pelanggan.index', compact('pelanggan'));
    }
    // tampil form tambah
    public function tambahPelanggan()
    {
        return view('backend.konten.pelanggan.tambahpelanggan');
    }
    // tambah pelanggan
    public function storePelanggan(Request $request)
    {
        $rules = [
            'nama_pelanggan' => 'required',
            'email' => 'required|unique:pelanggans',
            'no_telepon' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = new Pelanggan;

        $ktg->nama_pelanggan = $request->nama_pelanggan;
        $ktg->no_telp = $request->no_telepon;
        $ktg->email = $request->email;
        $ktg->password = Hash::make("mikatour");

        $ktg->save();
        Session::flash('success', 'New Pelanggan success added');
        return redirect('/pelanggan')->with(['success' => 'New Pelanggan success added']);
    }

    // tampil form edit
    public function editPelanggan($id)
    {
        $ktg = Pelanggan::find($id);
        return view('backend.konten.pelanggan.editpelanggan', compact('ktg'));
    }

    // Proses Edit Pelanggan
    public function updatePelanggan($id, Request $request)
    {
        $rules = [
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = Pelanggan::find($id);
        $ktg->nama_pelanggan = $request->nama_pelanggan;
        $ktg->no_telp = $request->no_telepon;
        $ktg->save();
        Session::flash('success', 'Pelanggan success updated');
        return redirect('/pelanggan');
    }
    // hapus pelanggan
    public function deletePelanggan($id)
    {
        $ktg = Pelanggan::find($id);
        $ktg->delete();
        Session::flash('success', 'Pelanggan success deleted');
        return redirect('/pelanggan');
    }
    // end pelanggan



    // Kategori
    // List Kategori
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('backend.konten.kategori.index', compact('kategori'));
    }
    // tampil form tambah
    public function tambahKategori()
    {
        return view('backend.konten.kategori.tambahkategori');
    }

    // tampil form edit
    public function editKategori($id)
    {
        $ktg = Kategori::find($id);
        return view('backend.konten.kategori.editkategori', compact('ktg'));
    }

    public function updateKategori($id, Request $request)
    {
        $rules = [
            'nama_kategori' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = Kategori::find($id);
        $ktg->nama_kategori = $request->nama_kategori;
        $ktg->save();
        Session::flash('success', 'Category success updated');
        return redirect('/kategori');
    }

    // tambah kategori
    public function storeKategori(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = new Kategori;

        $ktg->nama_kategori = $request->nama_kategori;

        $ktg->save();
        Session::flash('success', 'New Category success added');
        return redirect('/kategori')->with(['success' => 'New Category success added']);;
    }
    // hapus kategori
    public function deleteKategori($id)
    {
        $ktg = Kategori::find($id);
        $ktg->delete();
        Session::flash('success', 'Category success deleted');
        return redirect('/kategori');
    }
    // End Kategori


    // Staf
    // List Staf
    public function staf()
    {
        $staf = Staf::all();
        return view('backend.konten.staf.index', compact('staf'));
    }

    // tampil form tambah
    public function tambahStaf()
    {
        return view('backend.konten.staf.tambahstaf');
    }

    // tampil form edit
    public function editStaf($id)
    {
        $ktg = Staf::find($id);
        return view('backend.konten.staf.editstaf', compact('ktg'));
    }

    public function updateStaf($id, Request $request)
    {
        $rules = [
            'nama_staf' => 'required',
            'avatar' => 'max:10000',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        if ($request->hasFile('avatar')) {
            $resorce = $request->file('avatar');
            $name   = $resorce->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $name;
            $resorce->move(\base_path() . "/public/images", $newName);
        }

        $ktg = Staf::find($id);
        $ktg->nama_staf = $request->nama_staf;
        if ($request->hasFile('avatar')) {
            $ktg->avatar = $newName;
        }
        $ktg->save();
        Session::flash('success', 'Staf success updated');
        return redirect('/staf');
    }

    // tambah staf
    public function storeStaf(Request $request)
    {
        $rules = [
            'nama_staf' => 'required',
            'username' => 'required|unique:stafs',
            'password' => 'required',
            'email' => 'required|email|unique:stafs',
            'avatar' => 'required|image|mimes:jpg,png,jpeg|max:10000',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);


        $resorce       = $request->file('avatar');
        $name   = $resorce->getClientOriginalExtension();
        $newName = rand(100000, 1001238912) . "." . $name;
        $resorce->move(\base_path() . "/public/images", $newName);

        $ktg = new Staf;

        $ktg->nama_staf = $request->nama_staf;
        $ktg->username = $request->username;
        $ktg->password = Hash::make($request->password);
        $ktg->email = $request->email;
        $ktg->avatar = $newName;

        $ktg->save();
        Session::flash('success', 'New Staf success added');
        return redirect('/staf')->with(['success' => 'New Staf success added']);;
    }
    // hapus staf
    public function deleteStaf($id)
    {
        $ktg = Staf::find($id);
        $ktg->delete();
        Session::flash('success', 'Staf success deleted');
        return redirect('/staf');
    }
    // End Staf


    // Paket
    // List Paket
    public function paket()
    {
        $paket = Paket::with('categori')->get();
        return view('backend.konten.paket.index', compact('paket'));
    }
    // tampil form tambah
    public function tambahPaket()
    {
        $kategori = Kategori::all();
        return view('backend.konten.paket.tambahpaket', compact('kategori'));
    }

    // tampil form edit
    public function editPaket($id)
    {
        $ktg = Paket::with('fasilitas')->where('id', $id)->first();
        $kategori = Kategori::all();
        return view('backend.konten.paket.editpaket', compact('ktg', 'kategori'));
    }

    public function updatePaket($id, Request $request)
    {
        $rules = [
            'nama_paket' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        if ($request->hasFile('gambar')) {
            $resorce = $request->file('gambar');
            $name   = $resorce->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $name;
            $resorce->move(\base_path() . "/public/images/paket", $newName);
        }

        $ktg = Paket::find($id);
        $ktg->nama_paket = $request->nama_paket;
        $ktg->harga = $request->harga;
        if ($request->hasFile('gambar')) {
            $ktg->gambar = $request->gambar;
        }
        $ktg->kategori_id = $request->kategori;
        $ktg->save();

        if ($request->fasilitas[0] != null) {
            for ($i = 0; $i < count($request->fasilitas); $i++) {
                $ftl = new Fasilitas;

                $ftl->nama_fasilitas = $request->fasilitas[$i];
                $ftl->paket_id = $id;

                $ftl->save();
            }
        }

        if ($request->fasilitass) {
            for ($i = 0; $i < count($request->fasilitass); $i++) {
                $fsl = Fasilitas::find($request->idfasilitass[$i]);

                $fsl->nama_fasilitas = $request->fasilitass[$i];

                $fsl->save();
            }
        }

        Session::flash('success', 'Paket success updated');
        return redirect('/paket');
    }

    // tambah paket
    public function storePaket(Request $request)
    {
        $rules = [
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:10000',
            'kategori' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $resorce = $request->file('gambar');
        $name   = $resorce->getClientOriginalExtension();
        $newName = rand(100000, 1001238912) . "." . $name;
        $resorce->move(\base_path() . "/public/images/paket", $newName);

        $ktg = new Paket;

        $ktg->nama_paket = $request->nama_paket;
        $ktg->harga = $request->harga;
        $ktg->gambar = $newName;
        $ktg->kategori_id = $request->kategori;
        $ktg->save();

        $ftls = Paket::max('id');
        for ($i = 0; $i < count($request->fasilitas); $i++) {
            $ftl = new Fasilitas;

            $ftl->nama_fasilitas = $request->fasilitas[$i];
            $ftl->paket_id = $ftls;

            $ftl->save();
        }
        Session::flash('success', 'New Paket success added');
        return redirect('/paket')->with(['success' => 'New Paket success added']);;
    }
    // hapus paket
    public function deletePaket($id)
    {
        $ktg = Paket::find($id);
        $ktg->delete();
        $fal = Fasilitas::where('paket_id', $id);
        $fal->delete();
        Session::flash('success', 'Paket success deleted');
        return redirect('/paket');
    }
    // hapus paket fasillatisa
    public function deletePaketFal($id)
    {
        $ktg = Fasilitas::find($id);
        $ktg->delete();
        Session::flash('success', 'Fasilitas success deleted');
        return Redirect::Back();
    }
    // End Paket


    // Invoice
    // List Invoice
    public function invoice()
    {
        $invoice = Invoice::with('pelanggan')->get();
        return view('backend.konten.invoice.index', compact('invoice'));
    }
    // tampil form tambah
    public function tambahInvoice()
    {
        $tgl = date('Y-m-d');
        $paket = DB::select("select p.harga,p.nama_paket,p.id,ps.diskon from pakets p left join (select * from promos where tgl_selesai >= '" . $tgl . "' and tgl_mulai <= '" . $tgl . "') ps ON p.id=ps.paket_id ");
        $pelanggan = Pelanggan::all();
        return view('backend.konten.invoice.tambahinvoice', compact('paket', 'pelanggan'));
    }

    // cetak kwitansi
    public function cetakInvoice($id)
    {
        $invoice = Invoice::with('pelanggan')->where('id', $id)->first();
        $tgl = Invoice::find($id);
        $peserta = DB::select("SELECT r.no_dukumen,r.nama_peserta,r.tgl_berangkat,p.harga,p.nama_paket,p.id,ps.diskon from pesertas r inner join invoices i ON i.id=r.invoice_id inner join pakets p on r.paket_id=p.id left join (select * from promos where tgl_selesai >= '" . $tgl->tgl_inv . "' and tgl_mulai <= '" . $tgl->tgl_inv . "') ps ON p.id=ps.paket_id WHERE r.invoice_id='" . $id . "'");
        $pdf = PDF::loadView('backend.konten.invoice.cetakinvoice', compact('invoice', 'peserta'));
        return $pdf->stream('kwitansi_invoice_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    // tambah invoice
    public function storeInvoice(Request $request)
    {
        $rules = [
            'pelanggan' => 'required',
            'pesertaa.*' => 'required'
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);
        $kode = Invoice::max('id');
        $kdbr = substr($kode, 10);
        $jml = (int) $kdbr + 1;
        $id =  "STD01-" . date('d') . date('m') . $jml;
        $ktg = new Invoice;

        $ktg->tgl_inv = date('Y-m-d');
        $ktg->total_hrg = $request->totals;
        $ktg->pelanggan_id = $request->pelanggan;
        $ktg->id = $id;

        $ktg->save();

        for ($i = 0; $i < count($request->pesertaa); $i++) {
            $ftl = new Peserta;

            $ftl->invoice_id = $id;
            $ftl->paket_id = $request->pakett[$i];
            $ftl->no_dukumen = $request->dokumenn[$i];
            $ftl->tgl_berangkat = $request->tgll[$i];
            $ftl->nama_peserta = $request->pesertaa[$i];

            $ftl->save();
        }

        Session::flash('success', 'New Invoice success added');
        return redirect('/invoice')->with(['success' => 'New Category success added']);;
    }
    // End Invoice

    // Promosi Admin
    // List Promosi
    public function promosi()
    {
        $promosi = Promo::with('paket')->get();
        return view('backend.konten.promosi.index', compact('promosi'));
    }

    // tampil form tambah
    public function tambahPromosi()
    {
        $paket = DB::table('pakets')
            ->leftJoin('promos', 'promos.paket_id', '=', 'pakets.id')
            ->where('promos.id', '=', null)
            ->orWhere('promos.tgl_selesai', '<=', date('Y-m-d'))
            ->groupBy()
            ->select('pakets.id', 'pakets.nama_paket', 'pakets.harga')
            ->get();
        return view('backend.konten.promosi.tambahpromosi', compact('paket'));
    }

    // tambah promosi
    public function storePromosi(Request $request)
    {
        $rules = [
            'mulai' => 'required',
            'akhir' => 'required',
            'paket' => 'required',
            'diskon' => 'required',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = new Promo;

        $ktg->diskon = $request->diskon;
        $ktg->tgl_mulai = $request->mulai;
        $ktg->tgl_selesai = $request->akhir;
        $ktg->paket_id = $request->paket;

        $ktg->save();

        $ket = Paket::find($request->paket);
        $dis = array(
            'diskon' => $request->diskon,
            'akhir' => $request->akhir,
            'paket' => $ket->nama_paket
        );
        $plg = Pelanggan::all();
        foreach ($plg as $p) {
            Mail::send('backend.konten.promosi.email', $dis, function ($mail) use ($p) {
                $mail->to($p->email)
                    ->from('mikatravelindonesia@gmail.com', 'Mika Travel Indonesia')
                    ->subject('New Promo');
            });
        }

        Session::flash('success', 'New Promo success added');
        return redirect('/promo');
    }
    // hapus promosi
    public function deletePromosi($id)
    {
        $ktg = Promo::find($id);
        $ktg->delete();
        Session::flash('success', 'Promo success deleted');
        return redirect('/promo');
    }
    // End Promosi Admin

    // Testimoni
    public function testimoni()
    {
        $testi = DB::table('testimonis')
            ->join('invoices', 'testimonis.invoice_id', '=', 'invoices.id')
            ->join('pelanggans', 'invoices.pelanggan_id', '=', 'pelanggans.id')
            ->select('pelanggans.nama_pelanggan', 'invoices.id', 'testimonis.*')
            ->get();
        return view('backend.konten.testimoni.testimoni', compact('testi'));
    }

    public function publishTestimoni($id)
    {
        $tst = Testimoni::find($id);
        $tst->publish = 1;
        $tst->save();
        Session::flash('success', 'Testimoni success published');
        return redirect('/testimoni');
    }

    public function unPublishTestimoni($id)
    {
        $tst = Testimoni::find($id);
        $tst->publish = 0;
        $tst->save();
        Session::flash('success', 'Testimoni success unpublished');
        return redirect('/testimoni');
    }

    public function deleteTestimoni($id)
    {
        $tst = Testimoni::find($id);
        $tst->publish = 1;
        $tst->delete();
        Session::flash('success', 'Testimoni success deleted');
        return redirect('/testimoni');
    }
    // end testimoni


    // komplain
    // get notif dan nama
    public function komplain()
    {
        $id = auth()->user()->id;
        // $komplain = DB::Select("SELECT * from komplains k INNER JOIN detail_komplains dk ON k.id=dk.komplain_id LEFT JOIN stafs s ON k.staf_id=s.id WHERE k.solved=0 AND k.staf_id = null OR k.staf_id='" . $id . "'");
        $komplain = DB::Select("SELECT *,k.id as kode 
        from komplains k 
        INNER JOIN invoices i ON k.invoice_id=i.id
        INNER JOIN pelanggans p ON i.pelanggan_id=p.id 
        WHERE k.staf_id = null 
        OR k.staf_id='" . $id . "'
        AND k.solved=0 ");
        // $komplain = DB::Select("SELECT * from komplains k INNER JOIN invoices i ON k.invoice_id=i.id INNER JOIN pelanggans p ON i.pelanggan_id=p.id LEFT JOIN stafs s ON k.staf_id=s.id WHERE k.solved=0 AND k.staf_id = null OR k.staf_id='" . $id . "'");

        return json_encode($komplain);
    }
    public function notif()
    {
        $id = auth()->user()->id;

        $komplain = DB::Select("SELECT *,k.id as kode 
        from komplains k 
        INNER JOIN detail_komplains dk ON k.id=dk.komplain_id 
        INNER JOIN invoices i ON k.invoice_id=i.id 
        INNER JOIN pelanggans p ON i.pelanggan_id=p.id 
        WHERE k.staf_id = null 
        OR k.staf_id='" . $id . "'
        AND dk.read=0
        AND k.solved=0  
        ");

        return json_encode($komplain);
    }
    public function pesan($id)
    {
        $pesan = DB::Select("SELECT *,HOUR(TIMEDIFF(now(),dk.created_at)) as sisa
        from komplains k 
        INNER JOIN invoices i ON k.invoice_id=i.id 
        INNER JOIN detail_komplains dk ON k.id=dk.komplain_id 
        INNER JOIN pelanggans p ON i.pelanggan_id=p.id 
        LEFT JOIN stafs s ON k.staf_id=s.id 
        WHERE k.id='" . $id . "' and k.solved=0");
        return json_encode($pesan);
    }
    public function read($id)
    {
        $ktg = DetailKomplain::where('komplain_id', $id)->get();
        foreach ($ktg as $kt) {
            $kt->read = 1;
            $kt->save();
        }

        $data = array(
            'result' => 'berhasil'
        );
        return json_encode($data);
    }
    public function balas(Request $request)
    {
        // if ($request->ajax()) {
        $tst = Komplain::find($request->id);
        $tst->staf_id =  auth()->user()->id;
        $tst->save();

        $ktg = new DetailKomplain;

        $ktg->komplain_id = $request->id;
        $ktg->pesan = $request->psn;
        $ktg->sender = auth()->user()->id;

        $ktg->save();

        return response()->json($ktg);
        // return $request->all();
        // }
    }
    // end complain

    // Laporan
    // Form Laporan Top Pelanggan
    public function periodePelanggan()
    {
        return view('backend.konten.laporan.periodepelanggan');
    }
    // Form Laporan Top Paket
    public function periodePaket()
    {
        return view('backend.konten.laporan.periodepaket');
    }
    // Form Laporan Testimonial
    public function periodeTestimoni()
    {
        return view('backend.konten.laporan.periodetestimoni');
    }
    // Cetak Laporan Top Pelanggan
    public function cetakPelanggan(Request $request)
    {
        $awal = $request->tgl_awal;
        $akhir = $request->tgl_akhir;
        $tgl = date('d-m-Y');
        $laporan = DB::select("SELECT p.id,p.email,p.nama_pelanggan as nama,count(i.id) as jml_invoice,sum(i.total_hrg) as total FROM pelanggans p INNER JOIN invoices i ON p.id=i.pelanggan_id WHERE i.tgl_inv BETWEEN '" . $awal . "' AND '" . $akhir . "' group by p.id,p.email,p.nama_pelanggan order by jml_invoice DESC limit 5");
        $pdf = PDF::loadView('backend.konten.laporan.laporanpelanggan', compact('laporan', 'awal', 'tgl', 'akhir'));
        return $pdf->stream('laporantoppeserta_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    // Cetak Laporan Top Paket
    public function cetakPaket(Request $request)
    {
        $awal = $request->tgl_awal;
        $akhir = $request->tgl_akhir;
        $tgl = date('d-m-Y');
        $laporan = DB::select("SELECT p.id,p.harga,p.nama_paket as paket,count(pe.paket_id) as jml,sum(p.harga) as total FROM pakets p INNER JOIN pesertas pe ON p.id=pe.paket_id INNER JOIN invoices i ON pe.invoice_id=i.id WHERE i.tgl_inv BETWEEN '" . $awal . "' AND '" . $akhir . "' group by p.id,p.nama_paket,p.harga order by jml DESC limit 5");
        $pdf = PDF::loadView('backend.konten.laporan.laporanpaket', compact('laporan', 'awal', 'tgl', 'akhir'));
        return $pdf->stream('laporantoppaket_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    // Cetak Laporan Testimoni
    public function cetakTestimoni(Request $request)
    {
        $awal = $request->tgl_awal;
        $akhir = $request->tgl_akhir;
        $tgl = date('d-m-Y');
        $laporan = DB::select("SELECT * FROM testimonis t INNER JOIN invoices i ON i.id=t.invoice_id INNER JOIN pelanggans p ON p.id=i.pelanggan_id WHERE i.tgl_inv BETWEEN '" . $awal . "' AND '" . $akhir . "'");
        $pdf = PDF::loadView('backend.konten.laporan.laporantestimoni', compact('laporan', 'awal', 'tgl', 'akhir'));
        return $pdf->stream('laporantestimoni_' . date('Y-m-d_H-i-s') . '.pdf');
    }
    // End Laporan
}
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
// I LOVE YOU <3
