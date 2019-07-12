<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Invoice;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pelanggan');
    }

    public function index()
    {
        $invoice = Pelanggan::with('invoice')->where('id', auth()->user()->id)->get();
        return view('frontend.pelanggan', compact('invoice'));
    }
}
