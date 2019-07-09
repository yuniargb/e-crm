<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kategori;
use App\Staf;
use App\Paket;
use App\Fasilitas;
use App\Invoice;
use App\Peserta;
use PDF;
use Validator;
use Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BackController extends Controller
{
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
            'email' => 'required|unique:pelanggans',
        ];

        $message = [
            'required' => 'Please fill this field',
        ];

        $this->validate($request, $rules, $message);

        $ktg = Pelanggan::find($id);
        $ktg->nama_pelanggan = $request->nama_pelanggan;
        $ktg->no_telp = $request->no_telepon;
        $ktg->email = $request->email;
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
        $ktg->password = sha1($request->password);
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
        $ktg->kategori = $request->kategori;
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
        $ktg->kategori = $request->kategori;
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
        $paket = Paket::all();
        $pelanggan = Pelanggan::all();
        return view('backend.konten.invoice.tambahinvoice', compact('paket', 'pelanggan'));
    }

    // cetak kwitansi
    public function cetakInvoice($id)
    {
        $invoice = Invoice::with('pelanggan')->where('id', $id)->first();
        $peserta = Peserta::with('paket')->where('invoice_id', $id)->get();
        $pdf = PDF::loadView('backend.konten.invoice.cetakinvoice', compact('invoice', 'peserta'));
        // $pdf = PDF::loadView('backend.konten.invoice.cetakinvoice', compact('invoice', 'peserta'));
        // return $pdf->download('kwitansi_invoice_' . date('Y-m-d_H-i-s') . '.pdf');
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
        $id = (int) $kode + 1;
        $ktg = new Invoice;

        $ktg->tgl_inv = date('Y-m-d');
        $ktg->total_hrg = $request->totals;
        $ktg->user_id = $request->pelanggan;
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
}
