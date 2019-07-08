<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kategori;
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
    // pelanggan

    // Kategori
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('backend.konten.kategori.index', compact('kategori'));
    }

    public function tambahKategori()
    {
        return view('backend.konten.kategori.tambahkategori');
    }

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
        return redirect('/kategori');
    }

    public function deleteKategori($id)
    {
        $ktg = Kategori::find($id);
        $ktg->delete();
        Session::flash('success', 'New Category success deleted');
        return redirect('/kategori');
    }
}
