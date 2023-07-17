<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
    public function home()
    {
        return view('website.pages.home');
    }
    public function about()
    {
        return view('website.pages.about');
    }
    public function newarrivals()
    {
        return view('website.pages.newarrivals');
    }
    public function popularitems()
    {
        return view('website.pages.popularitems');
    }
    public function allproduct()
    {
        return view('website.pages.allproduct');
    }
}

 