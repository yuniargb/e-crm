<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

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
}
