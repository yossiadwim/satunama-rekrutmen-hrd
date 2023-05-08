<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index()
    {
        $this->authorize('user');
        return view('lamaran.index');
    }
}
