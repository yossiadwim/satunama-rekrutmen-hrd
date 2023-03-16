<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('main.index_admin');
    }
}
