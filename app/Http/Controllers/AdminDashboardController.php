<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');
        return view('main.index_admin',[
            'jobs' => Job::all()
        ]);
        // 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
        $this->authorize('admin');
        
        return view('admin.index_create_lowongan', [
            'departements' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nama_lowongan' => 'required|string',
            'slug' => 'required|unique:jobs',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ]);
        
        Job::create($validatedData);

        return redirect('/admin-dashboard')->with('success', 'Lowongan Berhasil Dibuat');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(string $job)
    {

        //
        return view('admin.index_edit_lowongan',[
            'job' => Job::where('slug', $job)->first(),
            'departements' => Department::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $job)
    {
        //
        $rules = [
            'nama_lowongan' => 'required|string',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ];

        $temp_job = Job::where('slug', $job)->first();

        if($request->slug != $temp_job->slug){
            $rules['slug'] = 'required|unique:jobs';
        }

        $validatedData = $request->validate($rules);
        Job::where('id', $temp_job->id)->update($validatedData);

        return redirect('/admin-dashboard')->with('success', 'Lowongan Berhasil Diedit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Job::class, 'slug', $request->nama_lowongan);

        return response()->json(['slug' => $slug]);
    }
}
