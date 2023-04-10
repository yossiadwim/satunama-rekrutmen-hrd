<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('main.index_admin', [

            'jobsOpen' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan as nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                ->where('closed', '=', 'false')
                ->groupBy('departments.nama_departemen','jobs.id')
                ->get()
                ->sortDesc(),

            'jobsClose' => Job::join('departments', 'jobs.id_departemen', '=', 'departments.id')
                ->select(DB::raw('jobs.id as job_id, id_departemen, departments.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, jobs.created_at, jobs.updated_at'))
                ->where('closed', '=', 'true')
                ->groupBy('departments.nama_departemen','jobs.id')
                ->get()
                ->sortDesc(),
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
            'closed' => 'required',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ]);

        Job::create($validatedData);


        return redirect('/admin-dashboard/jobs')->with('success', 'Lowongan Berhasil Dibuat');
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
    public function edit(Job $job)
    {

        return view('admin.index_edit_lowongan', [
            'job' => $job,
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
    public function update(Request $request, Job $job)
    {
        //
        $rules = [
            'nama_lowongan' => 'required|string',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ];

        if ($request->slug != $job->slug) {
            $rules['slug'] = 'required|unique:jobs';
        }

        $validatedData = $request->validate($rules);
        Job::where('id', $job->id)->update($validatedData);

        return redirect('/admin-dashboard/jobs')->with('success', 'Lowongan Berhasil Diedit');
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

    public function closeJobs(Request $request, Job $job)
    {

        $rules = [
            'closed' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Job::where('id', $job->id)->update($validatedData);

        return redirect('/admin-dashboard/jobs')->with('success closed', 'Lowongan Berhasil Ditutup');
    }
}
