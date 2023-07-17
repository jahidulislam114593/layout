<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function tables()
    {
        return view('admin.pages.tables');
    }
    public function charts()
    {
        return view('admin.pages.charts');
    }
}
