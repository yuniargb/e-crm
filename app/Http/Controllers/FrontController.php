<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
