<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function enroll(){
        return view('admin.pages.auth.enroll'); 
    }
}
