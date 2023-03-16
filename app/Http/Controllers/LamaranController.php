<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index()
    {
        return view('lamaran.index');
    }
}
