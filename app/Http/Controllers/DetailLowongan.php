<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailLowongan extends Controller
{
    public function index(){
        return view('lamaran.index_detail_lowongan');
    }
}
