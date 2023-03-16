<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;
use App\Http\Controllers\JobController;
// use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $departments = Department::all();
        // dd(Auth::user()->role);
        return view('main.index')->with('departments', $departments)->with('jobs', $jobs);
    }
}
