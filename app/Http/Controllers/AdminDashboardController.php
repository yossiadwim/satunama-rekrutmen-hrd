<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin_dashboard', [

            'jobsOpen' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                ->select(DB::raw('lowongan.id as id_lowongan, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan as nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                ->where('closed', '=', 'false')
                ->groupBy('departemen.nama_departemen', 'lowongan.id')
                ->get()
                ->sortDesc(),

            'jobsClose' => Lowongan::join('departemen', 'lowongan.id_departemen', '=', 'departemen.id_departemen')
                ->select(DB::raw('lowongan.id as job_id, lowongan.id_departemen, departemen.nama_departemen, nama_lowongan, slug, tipe_lowongan, deskripsi, lowongan.created_at, lowongan.updated_at'))
                ->where('closed', '=', 'true')
                ->groupBy('departemen.nama_departemen', 'lowongan.id')
                ->get()
                ->sortDesc(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud_lowongan.create_lowongan', [
            'departemen' => Departemen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_departemen' => 'required',
            'nama_lowongan' => 'required',
            'slug' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required',
            'closed' => 'required',

        ]);

        Lowongan::create($validatedData);
        return redirect('/admin-dashboard/lowongan')->with('success add', 'Lowongan Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {

        return view('dashboard.kelola_kandidat', [
            'lowongan' => $lowongan,
            'datas' =>  $lowongan->pelamarLowongan->load('pelamar.user', 'pelamar.pendidikan', 'pelamar.pengalamanKerja', 'dokumenPelamarLowongan.dokumenPelamar', 'statusLamaran.status')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {

        return view('crud_lowongan.edit_lowongan', [
            'lowongan' => $lowongan,
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $rules = [
            'nama_lowongan' => 'required|string',
            'id_departemen' => 'required',
            'tipe_lowongan' => 'required',
            'deskripsi' => 'required|string'
        ];

        if ($request->slug != $lowongan->slug) {
            $rules['slug'] = 'required|unique:lowongan';
        }

        $validatedData = $request->validate($rules);
        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/admin-dashboard/lowongan')->with('success edit', 'Lowongan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Lowongan::class, 'slug', $request->nama_lowongan);

        return response()->json(['slug' => $slug]);
    }

    public function closeJobs(Request $request, Lowongan $lowongan)
    {

        $rules = [
            'closed' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Lowongan::where('id', $lowongan->id)->update($validatedData);

        return redirect('/admin-dashboard/lowongan')->with('success closed', 'Lowongan Berhasil Ditutup');
    }

    public function chengePosition(Request $request)
    {
    }
}
