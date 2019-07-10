<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pelanggan');
    }

    public function index()
    {
        return view('frontend.pelanggan');
    }
}
