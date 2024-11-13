<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutCartController extends Controller
{
    public function index()
    {
        return view('frontend.aboutcart');
    }
    public function baohanh()
    {
        return view('frontend.Baohanh');
    }
    public function vanchuyen()
    {
        return view('frontend.Vanchuyen');
    }
    public function doitra()
    {
        return view('frontend.Doitra');
    }
}
