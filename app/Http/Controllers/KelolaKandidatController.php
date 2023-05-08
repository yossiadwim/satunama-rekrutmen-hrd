<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class KelolaKandidatController extends Controller
{
    public function index(){
        // return view('admin.index_kelola_kandidat');
    }

    public function show(Job $job){

      
        return view('admin.index_kelola_kandidat',[
            'jobs' => $job
        ]);
        
        
    }
}
